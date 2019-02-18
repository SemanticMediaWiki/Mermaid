# Mermaid

[![Build Status](https://secure.travis-ci.org/SemanticMediaWiki/Mermaid.svg?branch=master)](http://travis-ci.org/SemanticMediaWiki/Mermaid)
[![Latest Stable Version](https://poser.pugx.org/mediawiki/mermaid/version.png)](https://packagist.org/packages/mediawiki/mermaid)
[![Packagist download count](https://poser.pugx.org/mediawiki/mermaid/d/total.png)](https://packagist.org/packages/mediawiki/mermaid)

This extension provides the `#mermaid` parser function to support the generation of diagrams and flowcharts with the help of the [mermaid][mermaid] script language. Supported diagram forms include:

- Flowchart
- Sequence diagram
- Gantt diagram

## Requirements

- PHP 5.6 or later
- MediaWiki 1.27 or later

## Installation

The recommended way to install Semantic Compound Queries is using [Composer](http://getcomposer.org) with
[MediaWiki's built-in support for Composer](https://www.mediawiki.org/wiki/Composer).

### Step 1

Change to the base directory of your MediaWiki installation. This is where the "LocalSettings.php"
file is located. If you have not yet installed Composer do it now by running the following command
in your shell:

    wget https://getcomposer.org/composer.phar

### Step 2
    
If you do not have a "composer.local.json" file yet, create one and add the following content to it:

```
{
	"require": {
		"mediawiki/mermaid": "~2.0"
	}
}
```

If you already have a "composer.local.json" file add the following line to the end of the "require"
section in your file:

    "mediawiki/mermaid": "~2.0"

Remember to add a comma to the end of the preceding line in this section.

### Step 3

Run the following command in your shell:

    php composer.phar update --no-dev

Note if you have Git installed on your system add the `--prefer-source` flag to the above command. Also
note that it may be necessary to run this command twice. If unsure do it twice right away.

### Step 4

Add the following line to the end of your "LocalSettings.php" file:

    wfLoadExtension( 'Mermaid' );

### Verify installation success

As final step, you can verify Mermaid got installed by looking at the "Special:Version" page on your wiki and
check that it is listed.

## Usage

The `#mermaid` parser function allows to add [mermaid][mermaid] typed content to a wiki article. For example, copying [examples](https://mermaidjs.github.io/) is as easy as:

```
{{#mermaid:sequenceDiagram
participant Alice
participant Bob
  Alice->John: Hello John, how are you?
  loop Healthcheck
       John->John: Fight against hypochondria
  end
  Note right of John: Rational thoughts <br/>prevail...
    John-->Alice: Great!
    John->Bob: How about you?
    Bob-->John: Jolly good!
}}
```
![image](https://user-images.githubusercontent.com/1245473/34535703-14a32100-f106-11e7-9201-ea90a6286c58.png)

## Contribution and support

If you want to contribute work to the project please subscribe to the developers mailing list and
have a look at the contribution guideline.

* [File an issue](https://github.com/SemanticMediaWiki/Mermaid/issues)
* [Submit a pull request](https://github.com/SemanticMediaWiki/Mermaid/pulls)
* Ask a question on [the mailing list](https://www.semantic-mediawiki.org/wiki/Mailing_list)
* Ask a question on the #semantic-mediawiki IRC channel on Freenode.

## Tests

This extension provides unit and integration tests that are run by a [continues integration platform][travis]
but can also be executed using `composer phpunit` from the extension base directory.

## License

[GNU General Public License, version 2 or later][gpl-licence].

[gpl-licence]: https://www.gnu.org/copyleft/gpl.html
[travis]: https://travis-ci.org/SemanticMediaWiki/Mermaid
[smw]: https://github.com/SemanticMediaWiki/SemanticMediaWiki
[composer]: https://getcomposer.org/
[mermaid]: https://github.com/knsv/mermaid
