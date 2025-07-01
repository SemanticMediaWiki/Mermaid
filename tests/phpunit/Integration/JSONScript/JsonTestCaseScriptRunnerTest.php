<?php

namespace Mermaid\Tests\Integration\JSONScript;

use ExtensionRegistry;
use MediaWiki\MediaWikiServices;
use Mermaid\Hooks;
use SMW\Tests\Integration\JSONScript\JSONScriptTestCaseRunnerTest;

/**
 * @group Mermaid
 * @group Database
 * @group SMWExtension
 */
class JsonTestCaseScriptRunnerTest extends JSONScriptTestCaseRunnerTest {

    protected function setUp(): void {
        parent::setUp();
        
        // register the parser functions for each test
        $parser = MediaWikiServices::getInstance()->getParser();
        Hooks::onParserFirstCallInit( $parser );
    }

    protected function getTestCaseLocation() {
        return __DIR__ . '/TestCases';
    }

    protected function getPermittedSettings() {
        return array_merge( parent::getPermittedSettings(), [] );
    }

    /**
	 * @see JsonTestCaseScriptRunner::getDependencyDefinitions
	 */
	protected function getDependencyDefinitions() {
		return [
			'Mermaid' => [ $this, 'checkMermaidDependency' ]
		];
	}

	public function checkMermaidDependency( $val, &$reason ) {
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'Mermaid' ) ) {
            $reason = "Dependency: Mermaid as requirement is not available!";
            return false;
        }

        // Match operator and version
        if ( !preg_match('/^(>=|<=|>|<|==)?\s*(.+)$/', $val, $matches) ) {
            $reason = "Dependency: Invalid Mermaid version requirement format: '$val'";
            return false;
        }

        $compare = $matches[1] ?: '==';
        $requiredVersion = $matches[2];

        $version = ExtensionRegistry::getInstance()->getAllThings()['Mermaid']['version'] ?? '0.0.0';

        if ( !version_compare( $version, $requiredVersion, $compare ) ) {
            $reason = "Dependency: Required version of Mermaid ($requiredVersion $compare $version) is not available!";
            return false;
        }

        return true;
	}
}
