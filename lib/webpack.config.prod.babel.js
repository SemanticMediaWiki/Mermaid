import { jsConfig } from './webpack.config.base'
import TerserPlugin from 'terser-webpack-plugin'

// Replaces file of same name in https://github.com/mermaid-js/mermaid/blob/develop/webpack.config.prod.babel.js
// Need to set max-line-length to match MediaWiki Javascript minifier https://doc.wikimedia.org/mediawiki-core/master/php/classJavaScriptMinifier.html#a8f29e7a5d609bfcb96692ba99d6154a6
// Necessary to prevent many bad line breaks from the MW Minifier breaking the scripts.

const minConfig = jsConfig()
minConfig.mode = 'production'
minConfig.output.filename = '[name].min.js'
minConfig.output.globalObject = 'window'
minConfig.optimization = {
    splitChunks: {
        chunks: 'all',
        automaticNameDelimiter: '-'
      },
    minimizer: [new TerserPlugin({
        terserOptions: {
            output: {
                max_line_len: 800
            }
        },
        extractComments: false
    })]
}

export default [minConfig]
