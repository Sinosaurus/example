const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');
const devMode = process.env.NODE_ENV !== 'production'

const path = require('path')

function resolve (dir) {
  return path.join(__dirname, '..', dir)
}
function assetsPath (_path) {
  const assetsSubDirectory = 'static'
  return path.posix.join(assetsSubDirectory, _path)
}
module.exports = {
  mode: 'development',
  // 开启监视模式、此时执行webpack指令进行打包会监视文件变化自动打包
  watch: true,
  devServer: {
    contentBase: resolve("dist"),
    compress: true, // gzip
    hot:true,
    open: true,
    port: 9000,
    host: 'localhost',
    contentBase:'./src',
    historyApiFallback: {
      rewrites: [
        { from: /.*/, to: path.posix.join('/', 'index.html') },
      ],
    },
  },
  entry: './src/index.js',
  output: {
    path: resolve('dist'),
    filename: 'dist.js'
  },
  module: {
    rules: [
      // {
      //   test: '/\.less$/',
      //   use: [{
      //     loader: 'style-loader' // creates style nodes from JS strings
      //   }, {
      //     loader: 'css-loader' // translates CSS into CommonJS
      //   }, {
      //     loader: 'less-loader' // compiles Less to CSS
      //   }]
      // },
      {
        test: '/\.(le|c)ss$',
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: './',
              hmr: devMode, // 仅dev环境启用HMR功能
            }
          },
          'css-loader',
          'autoprefixer-loader',
          'less-loader'
        ]
      },
      // {
      //   test: /\.js$/,
      //   use: 'babel-loader',
      //   include: [resolve('src'), resolve('node_modules/webpack-dev-server/client')]
      // },
      // {
      //   test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
      //   use: 'url-loader',
      //   options: {
      //     limit: 10000,
      //     name: assetsPath('img/[name].[hash:7].[ext]')
      //   }
      // },
      // {
      //   test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
      //   use: 'url-loader',
      //   options: {
      //     limit: 10000,
      //     name: assetsPath('fonts/[name].[hash:7].[ext]')
      //   }
      // }
    ]
  },
  plugins: [
    new webpack.HotModuleReplacementPlugin(),
    new MiniCssExtractPlugin({
      // 这里的配置和webpackOptions.output中的配置相似
      // 即可以通过在名字前加路径，来决定打包后的文件存在的路径
      filename: devMode ? 'css/[name].css' : 'css/[name].[hash].css',
      chunkFilename: devMode ? 'css/[id].css' : 'css/[id].[hash].css',
    }),
    new HtmlWebpackPlugin({
      title: 'webpack-study',
      filename: 'index.html',
      template: './index.html',
      inject: true
    })
  ]
};