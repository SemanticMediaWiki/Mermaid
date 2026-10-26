import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import terserCjs from '@rollup/plugin-terser';
import { transform } from 'esbuild';
const terser = terserCjs.default || terserCjs;

export default {
  input: 'resources/ext.mermaid.js',
  output: {
    file: 'resources/mermaid.min.js',
    format: 'umd',
    name: 'mermaid',
    inlineDynamicImports: true
  },
  plugins: [
    resolve(),
    commonjs(),
    {
      name: 'mediawiki-compatible-syntax',
      async renderChunk(code) {
        // MediaWiki 1.45 uses wikimedia/minify 2.9, which cannot safely
        // process optional chaining. Lower syntax across the entire bundle.
        return transform(code, { loader: 'js', target: 'es2017' });
      }
    },
    terser({ ecma: 2017 })
  ]
};
