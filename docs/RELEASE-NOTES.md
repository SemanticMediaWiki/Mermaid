This file contains the *release notes* of the **Mermaid** extension. See also the
[readme], the [installation and configuration information] and [usage examples].

### 6.0.0

Released July 7, 2025.

* Upgraded Mermaid.js to version 10.9.3.
* Updated configMap to align with the official Mermaid.js v10.9.3 configuration.
* Switched from multiple separate script files to a single bundled file using Rollup, improving load performance and simplifying ResourceLoader configuration.
* Refactored initialization code: Mermaid library and extension-specific logic are now bundled together in mermaid.min.js.
* Removed the need for explicit script load ordering by using a single packageFiles entry.
* Dropped usage of global Mermaid variable exposure; now using ES module import internally and UMD bundle output.
* Simplified extension configuration and improved maintainability by consolidating scripts.
* Added more JSONScript test cases.
* Ensured all existing tests pass successfully with the new bundling approach and Mermaid version.

### 5.0.2

Released July 2, 2025.

* Upgraded Mermaid.js to version `9.4.3`.
* Added support for modern diagram types and improved rendering accuracy from recent Mermaid versions.
* Updated integration logic because Mermaid builds from `9.x+` no longer expose mermaid as a global variable by default.
* Cleanup and optimization of the `ext.mermaid.js` file and ResourceLoader configuration for improved stability and maintainability.
* Wrapped JavaScript initialization in error handling to prevent crashes if rendering fails.

### 5.0.1

Released July 2, 2025.

* Updated ResourceLoader script path to match build output: `resources/mermaid/mermaid.min.js`.
* Translation updates from https://translatewiki.net

### 5.0.0

Released July 2, 2025.

* Updated to using version 9.4.0 of the mermaid script language.
* Translation updates from https://translatewiki.net

### 4.0.1

Released July 2, 2025.

* Reverted breaking changes (incorrect file deletions, broken ResourceLoader paths)
* Restored stable state from version 4.0.0 as the new baseline
* Cleaned up internal ResourceLoader configuration and ensured proper mermaid.min.js resolution
* Translation updates from https://translatewiki.net

### 4.0.0

Released July 2, 2025.

* Switched to npm for managing Mermaid dependencies and build scripts
* Removed yarn.lock
* Updated README and developer docs to reflect npm usage starting from this version
* Added extensive JSONScript integration tests covering core Mermaid diagram types: 
  - flowcharts, 
  - sequence diagrams, 
  - class diagrams, 
  - state diagrams, 
  - Gantt charts, 
  - pie charts, 
  - quadrant charts, 
  - and requirement diagrams
* Improved test reliability and handling of HTML escaping and multi-line content
* Added PHP CodeSniffer linting and fixed related code style issues
* Updated CI badges and build scripts accordingly

### 3.1.0

Released April 6, 2022.

* Updated to using version 8.14.0 of the mermaid script language.
* Code improvements and minor issue fixes
* Translation updates from https://translatewiki.net

### 3.0.1

Released January 14, 2021.

* Fixed issue with class loading in some environments
* Translation updates from https://translatewiki.net

### 3.0.0

Released August 10, 2020.

* Changed minimum MediaWiki version to 1.33
* Changed minimum PHP version from 5.6 to 7.0
* Mermaid now needs to be enabled with `wfLoadExtension`
* Added support for all configuration options provided by the mermaid script language
* Updated to version 8.5.0 of the Mermaid scripting language
* Translation updates from https://translatewiki.net

### 2.2.0

Released on March 7, 2020.

* Introduces the flowchart `useMaxWidth` configuration parameter
* Translation updates from https://translatewiki.net

### 2.1.1

Released on May 20, 2019.

* Fixes loading of configuration settings

### 2.1.0

Released on March 5, 2019.

* Removes deprecated `mediawiki.api.parse` alias

### 2.0.0

Released on February 18, 2019.

* Updated to use version 8.0.0 of the mermaid script language.
* Translation updates from https://translatewiki.net

### 1.0.1

Released on February 13, 2018.

* Improves ID entropy for generated diagrams and charts
* Translation updates from https://translatewiki.net

### 1.0.0

Released on January 16, 2018.

* Initial release using version 7.0.5 of the mermaid script language.
* Added an `MERMAID` parser to easily generate diagrams and flowcharts with the help of the mermaid script language 
* Localizations from https://translatewiki.net

[readme]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/README.md
[installation and configuration information]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/INSTALL.md
[usage examples]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/USAGE.md
