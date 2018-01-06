# Mermaid

[![Build Status](https://secure.travis-ci.org/SemanticMediaWiki/Mermaid.svg?branch=master)](http://travis-ci.org/SemanticMediaWiki/Mermaid)
[![Code Coverage](https://scrutinizer-ci.com/g/SemanticMediaWiki/Mermaid/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/SemanticMediaWiki/Mermaid/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SemanticMediaWiki/Mermaid/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SemanticMediaWiki/Mermaid/?branch=master)
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

The recommended way to install Mermaid is by using [Composer][composer] with
an entry in MediaWiki's `composer.json` or `composer.local.json`.

```json
{
	"require": {
		"mediawiki/mermaid": "~1.0"
	}
}
```
1. From your MediaWiki installation directory, execute
   `composer require mediawiki/mermaid:~1.0`
2. Add `wfLoadExtension( 'Mermaid' );` to the `LocalSettings.php`
3. Navigate to _Special:Version_ on your wiki and verify that the package
   have been successfully installed.

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
