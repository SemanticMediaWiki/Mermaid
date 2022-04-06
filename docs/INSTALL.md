This file contains the *installation and configuration instructions* for the **Mermaid** extension.
See also the [readme], the [release notes] and [usage examples].

## Installation

The recommended way to install this extension is using [Composer](http://getcomposer.org) with
[MediaWiki's built-in support for Composer](https://www.mediawiki.org/wiki/Composer).

### Step 1
    
If you do not have a "composer.local.json" file yet, create one and add the following content to it:

```
{
	"require": {
		"mediawiki/mermaid": "~3.1"
	}
}
```

If you already have a "composer.local.json" file add the following line to the end of the "require"
section in your file:

    "mediawiki/mermaid": "~3.1"

Remember to add a comma to the end of the preceding line in this section.

### Step 2

Run the following command in your shell:

    php composer.phar update --no-dev

### Step 3

Add the following line to the end of your "LocalSettings.php" file:

    wfLoadExtension( 'Mermaid' );


## Configuration

One configuration parameter is provided allowing to choose the basic theme for rendering diagrams and charts.
By default the rendering is set to use the `forest` theme:

    $mermaidgDefaultTheme = 'forest';

If one would like to use one of the other themes provided (`default`, `neutral` or `dark`) the configuration
parameter can be set to it after invoking the extension, e.g.:

    wfLoadExtension( 'Mermaid' );  
    $mermaidgDefaultTheme = 'neutral';

[readme]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/README.md
[release notes]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/RELEASE-NOTES.md
[usage examples]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/USAGE.md
