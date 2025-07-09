import fetch from 'node-fetch';
import { Node, SyntaxKind, TypeLiteralNode, InterfaceDeclaration, Project } from "ts-morph";
import { readFileSync, writeFileSync } from 'fs';
import path from 'path';

async function generateConfigMap() {
  const version = 'v10.9.3';
  const url = `https://raw.githubusercontent.com/mermaid-js/mermaid/${version}/packages/mermaid/src/config.type.ts`;
  const response = await fetch(url);
  const sourceCode = await response.text();

  // Create a ts-morph project and parse the source code
  const project = new Project({ useInMemoryFileSystem: true });
  const sourceFile = project.createSourceFile('config.type.ts', sourceCode);

  // Get the main interface MermaidConfig
  const mainIface = sourceFile.getInterfaceOrThrow('MermaidConfig');

  // Helper function to find InterfaceDeclaration by name
  function getInterfaceByName(name: string): InterfaceDeclaration | undefined {
    return sourceFile.getInterface(name);
  }

  // Function to determine if a property is boolean or boolean union
  function isBooleanProperty(prop: import("ts-morph").PropertySignature): boolean {
    const type = prop.getType();
    return type.isBoolean() || (type.isUnion() && type.getUnionTypes().some(t => t.isBoolean()));
  }

  // Recursive function to extract all properties from an interface, flattening nested properties
  // Returns a map of property names (dot notation) to either 'FILTER_VALIDATE_BOOLEAN' or null
  function extractProperties(
    iface: InterfaceDeclaration,
    prefix = ''
  ): Record<string, string | null> {
    const result: Record<string, string | null> = {};

    iface.getProperties().forEach(prop => {
      const name = prop.getName();
      const typeNode = prop.getTypeNode();

      if (!typeNode) {
        // No explicit type node, assign null
        result[prefix + name] = null;
        return;
      }

      if (Node.isTypeLiteral(typeNode)) {
        // Inline object type (TypeLiteral) - recurse into it
        const nestedProps = extractFromTypeLiteral(typeNode as TypeLiteralNode, prefix + name + '.');
        Object.assign(result, nestedProps);
      } else if (Node.isTypeReference(typeNode)) {
        // Type reference - lookup interface and recurse
        const typeName = typeNode.getText();
        const refIface = getInterfaceByName(typeName);
        if (refIface) {
          const nestedProps = extractProperties(refIface, prefix + name + '.');
          Object.assign(result, nestedProps);
        } else {
          // Reference not found - just assign null
          result[prefix + name] = null;
        }
      } else {
        // Other types - check if boolean to assign filter
        if (isBooleanProperty(prop)) {
          result[prefix + name] = 'FILTER_VALIDATE_BOOLEAN';
        } else {
          result[prefix + name] = null;
        }
      }
    });

    return result;
  }

  // Recursive extraction of properties from TypeLiteralNode, with same filter logic
  function extractFromTypeLiteral(
    typeLiteralNode: TypeLiteralNode,
    prefix = ''
  ): Record<string, string | null> {
    const result: Record<string, string | null> = {};

    typeLiteralNode.getMembers().forEach(member => {
      if (member.getKind() === SyntaxKind.PropertySignature) {
        const propSig = member.asKindOrThrow(SyntaxKind.PropertySignature);
        const name = propSig.getName();
        const typeNode = propSig.getTypeNode();

        if (!typeNode) {
          result[prefix + name] = null;
          return;
        }

        if (Node.isTypeLiteral(typeNode)) {
          const nestedProps = extractFromTypeLiteral(typeNode as TypeLiteralNode, prefix + name + '.');
          Object.assign(result, nestedProps);
        } else if (Node.isTypeReference(typeNode)) {
          const typeName = typeNode.getText();
          const refIface = getInterfaceByName(typeName);
          if (refIface) {
            const nestedProps = extractProperties(refIface, prefix + name + '.');
            Object.assign(result, nestedProps);
          } else {
            result[prefix + name] = null;
          }
        } else {
          if (isBooleanProperty(propSig)) {
            result[prefix + name] = 'FILTER_VALIDATE_BOOLEAN';
          } else {
            result[prefix + name] = null;
          }
        }
      }
    });

    return result;
  }

  // Extract all properties starting from the main interface
  const configMap = extractProperties(mainIface);

  // Sort keys for nicer output
  const sortedKeys = Object.keys(configMap).sort();

  // Group keys by their prefix (segment before first dot), global group for keys without dot
  const grouped: Record<string, string[]> = {};
  for (const key of sortedKeys) {
    const group = key.includes('.') ? key.split('.')[0] : 'global';
    if (!grouped[group]) grouped[group] = [];
    grouped[group].push(key);
  }

  // Indentation string: 2 tabs
  const indent = '\t\t';

  // Generate PHP array lines with comments grouping each diagram type
  const phpLines: string[] = [];
  phpLines.push('private $configMap = [');

  // Output global group first without comment
  if (grouped['global']) {
    phpLines.push(`${indent}// global`);
    for (const key of grouped['global']) {
      const val = configMap[key];
      phpLines.push(`${indent}'${key}' => ${val ?? 'null'},`);
    }
    delete grouped['global'];
  }

  // Output other groups with comment headers
  for (const group of Object.keys(grouped).sort()) {
    phpLines.push(`\n${indent}// ${group}`);
    for (const key of grouped[group]) {
      const val = configMap[key];
      phpLines.push(`${indent}'${key}' => ${val ?? 'null'},`);
    }
  }

  phpLines.push(`\t];`);

  const newConfigMapBlock = phpLines.join('\n');

  // --- Automatically update PHP file ---

  const phpFilePath = path.resolve('src', 'MermaidConfigExtractor.php');
  const phpFileContent = readFileSync(phpFilePath, 'utf-8');

  // Regex to find the existing $configMap block
  const configMapRegex = /private \$configMap = \[[\s\S]*?\];/m;

  if (!configMapRegex.test(phpFileContent)) {
    console.error('ERROR: Could not find $configMap block in PHP file.');
    process.exit(1);
  }

  // Replace the old block with the new generated block
  const newPhpFileContent = phpFileContent.replace(configMapRegex, newConfigMapBlock);

  // Write back to the PHP file
  writeFileSync(phpFilePath, newPhpFileContent, 'utf-8');

  console.log(`ConfigMap updated successfully!`);
}

generateConfigMap().catch(err => {
  console.error('Error:', err);
  process.exit(1);
});
