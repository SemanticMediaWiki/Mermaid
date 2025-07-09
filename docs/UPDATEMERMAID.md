# Updating `mermaid` Library

Starting from version 6.0.0, this extension uses a **Rollup-based bundling approach** to include both the `mermaid` library and extension-specific initialization code in a single bundled file (`mermaid.min.js`).

This document is intended for **developers only**. Users should simply install a tagged release of the extension that already contains the bundled `mermaid.min.js`.


## How It Works

After running `npm install`, the following occurs:

1. **Library Installation**  

   The version of `mermaid` specified in `package.json` is installed into `node_modules`.

2. **Bundling via Rollup `rollup.config.mjs`**  

   This file includes both the `mermaid` library and extension-specific initialization code to find and render Mermaid diagrams on the page using the global mermaid object.

    Rollup is configured to:

    - Bundle both mermaid and the extension code into a single output file (`resources/mermaid.min.js`)
    - Use the UMD format, so mermaid becomes available globally
    - Inline all dependencies (inlineDynamicImports: true)
    - Minify the output with terser

    This approach ensures that ResourceLoader can treat the final file as a single script without requiring multiple scripts or worrying about load order.

### To Update `mermaid` and `configMap`

1. Open `package.json` and change the version under `"mermaid"`  
   (e.g., `"mermaid": "latest"` or a specific version like `"10.9.3"`).

2. Open `scripts/generateConfigMap.ts` and change the version under `"version"`  
   (e.g., specific version like `"v10.9.3"` or `"mermaid@11.8.1"`, so it is important to be the same as here https://github.com/mermaid-js/mermaid/releases ).

3. Run:

   ```bash
   npm install
   ```
