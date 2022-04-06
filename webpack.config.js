/**
 * Separate config for IDE correct works
 */
const path = require('path');
const webpack = require('webpack');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '~': path.resolve(__dirname, 'resources/sass')
        }
    },
    output: {
        filename: '[name].js',
        chunkFilename: 'js/[name].[chunkhash:6].js',
    },
};
