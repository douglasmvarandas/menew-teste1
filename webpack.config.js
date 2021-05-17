const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    use: [
        'vue-style-loader',
        'css-loader',
        'stylus-loader'
      ]
};
