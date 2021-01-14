Mermaid 3.0.0 indroduced a new mechanism to update the MermaidJS library to be shipped with this
extension. This document explains how to do it. This document was created for developers only.
Users need to [install] this extension with whatever version of MermaidJS it was tagged and released.

In order to update this repo for future updates, clone this repo and run 

    yarn install

This will pull from the upstream repo and patch the dist js file to load for the mediawiki extension.
Commit any changes and create a pull request back to the Mermaid extension's repo to put back into the
composer packages.

[install]: https://github.com/SemanticMediaWiki/Mermaid/blob/master/docs/INSTALL.md
