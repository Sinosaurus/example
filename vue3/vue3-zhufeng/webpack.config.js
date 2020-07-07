/*
 * @LastEditors: Sinosaurus
 */ 
const HtmlWebpackPlugin = require('html-webpack-plugin')
module.exports = {
  devServer: {
    port: 7777
  },
  mode: 'development',
  entry: './src/index.js',
  output: {
    filename: 'bundle.js'
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: './index.html'
    })
  ]
}
