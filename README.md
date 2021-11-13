# Mermaid
[![CI](https://github.com/SemanticMediaWiki/Mermaid/actions/workflows/main.yml/badge.svg)](https://github.com/SemanticMediaWiki/Mermaid/actions/workflows/main.yml)
[![codecov](https://codecov.io/gh/SemanticMediaWiki/Mermaid/branch/master/graph/badge.svg?token=65C6fSUmuO)](https://codecov.io/gh/SemanticMediaWiki/Mermaid)
[![Latest Stable Version](https://poser.pugx.org/mediawiki/mermaid/version.png)](https://packagist.org/packages/mediawiki/mermaid)
[![Packagist download count](https://poser.pugx.org/mediawiki/mermaid/d/total.png)](https://packagist.org/packages/mediawiki/mermaid)

This extension provides the `#mermaid` parser function to support the generation of diagrams and flowcharts with the help of the [mermaid][mermaid] script language. Supported diagram forms include:

- Flowchart
- Sequence Diagram
- Class Diagram
- State Diagram
- Gantt Chart
- Pie Chart
- Entity Relationship Diagram
- Git Flow Chart
- User Journey Chart

## Requirements

Requirements for Mermaid 3.x:

- PHP 7.0 or later
- MediaWiki 1.33 or later

You can use an older version of Mermaid for older versions of MediaWiki and/or PHP.

## Installation and configuration

See the information on [installing and configuring] this extension.

## Usage

See the information on [using] this extension.

## Contribution and support

If you want to contribute work to the project please subscribe to the developers mailing list and
have a look at the contribution guideline.

* [File an issue](https://github.com/SemanticMediaWiki/Mermaid/issues)
* [Submit a pull request](https://github.com/SemanticMediaWiki/Mermaid/pulls)
* Ask a question on [the mailing list](https://www.semantic-mediawiki.org/wiki/Mailing_list)

## For developers

See the documention on how to [update MermaidJS](https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/UPDATEMERMAID.md).

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
[installing and configuring]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/INSTALL.md
[using]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/USAGE.md

