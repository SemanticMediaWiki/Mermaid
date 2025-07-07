const fs = require('fs');
const path = require('path');

const targetFile = path.resolve(__dirname, '../../resources/mermaid.min.js');
const comment = '/*@nomin*/\n';

const content = fs.readFileSync(targetFile, 'utf8');
fs.writeFileSync(targetFile, comment + content, 'utf8');

console.log('Prepended /*@nomin*/ to mermaid.min.js');