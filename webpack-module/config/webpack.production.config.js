const path = require('path');

module.exports = {
  mode: 'development',
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'dist.js'
  },
  module: {
    rules: [
      { test: /\.less$/, use: 'less-loader' }
    ]
  },
  plugins: [

  ]
};