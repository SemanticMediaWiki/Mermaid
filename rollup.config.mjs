import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import terserCjs from '@rollup/plugin-terser';
const terser = terserCjs.default || terserCjs;

export default {
  input: 'resources/ext.mermaid.js',
  output: {
    file: 'resources/mermaid.min.js',
    format: 'umd',
    name: 'mermaid',
    inlineDynamicImports: true,
    sourcemap: true,
  },
  plugins: [
    resolve(),
    commonjs(),
    terser()
  ]
};
