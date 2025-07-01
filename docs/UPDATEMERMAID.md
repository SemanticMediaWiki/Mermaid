## Updating `mermaid` Library
Mermaid 4.0.0 introduced a new mechanism to update the MermaidJS library shipped with this extension. Starting from this version, the extension switched from using `yarn` to `npm` for managing and updating MermaidJS. This document explains how to perform the update using npm. It is intended for developers only. Users should simply install the extension version tagged with the desired MermaidJS release.

### How It Works
After running `npm install`, the following happens automatically:

1. **Copying Files**  
    The `copy-files-from-to` tool copies the minified `mermaid` files from `node_modules` to the `resources/mermaid/` directory:
    - `mermaid.min.js`
    - `mermaid.min.js.map`

2. **Injecting Comment**  
    A custom script (`inject-nomin.js`) prepends the line `/*@nomin*/` to `mermaid.min.js`.  
    This comment prevents MediaWiki's ResourceLoader from re-minifying the file.

### To Update `mermaid`

1. Open `package.json` and change the version under `"mermaid"`  
   (e.g., `"mermaid": "latest"` or a specific version like `"8.14.0"`).

2. Run:

   ```bash
   npm install
   ```
