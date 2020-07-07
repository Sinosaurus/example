
const path = require('path')
// 清楚dist里存在的文件
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
// 生成html
const HtmlWebpackPlugin = require('html-webpack-plugin')
// 复制文件  一般正式打包才会使用
// const CopyWebpackPlugin = require('copy-webpack-plugin')
// 自定义一处 js注释插件
const RemoveCommentsWebpackPlugin = require('./remove-comments-webpack-plugin.js')
// 热加载 
const { HotModuleReplacementPlugin, DefinePlugin } = require('webpack')

// 将css从js中抽离到css文件中
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
// 压缩css代码
const OptimizeCssAssetsWebpackPlugin = require('optimize-css-assets-webpack-plugin')
const TerserWebpackPlugin = require('terser-webpack-plugin')
// 开启属性类型推导， 类似typescript
/**
 * @type { import('webpack').Configuration } 
 */
const config = {
  mode: 'none',
  entry: './src/index.js',
  devServer: {
    // 开启 HMR 特性，如果资源不支持 HMR 会 fallback 到 live reloading
    hot: true,
    // 只使用 HMR，不会 fallback 到 live reloading
    // hotOnly: true,
 
    port: 7777,
    open: true,
    proxy: {
      '/api': {
        target: 'https://api.github.com',
        pathRewrite: {
          '^/api': '' // 替换掉代理地址中的 /api
        },
        changeOrigin: true // 确保请求 GitHub 的主机名就是：api.github.com
      }
    }
  },
  output: {
    filename: 'bundle.js',
    path: path.join(__dirname, 'dist')
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          // 'style-loader',
          MiniCssExtractPlugin.loader,
          'css-loader'
        ]
      },
      {
        test: /\.md$/,
        use: [
          'html-loader',
          './markdown-loader.js'
        ]
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin(),
    // htmlWebpackPlugin每个实例对应一个页面
    new HtmlWebpackPlugin({
      title: 'webpack-study',
      template: './index.html'
      // meta: {
      //   viewport: 'width=device-width, initial-scale=1.0'
      // }
    }),
    // new CopyWebpackPlugin([
    //   {
    //     from: '/public/**/*'// 需要拷贝的目录或路径
    //   }
    // ], {
    //   copyUnmodified: true
    // }) 
    // new CopyWebpackPlugin({
    //   patterns: [
    //     {
    //       from: 'public',// 需要拷贝的目录或路径
    //       to: 'public'
    //     }
    //   ]
    // }),
    new RemoveCommentsWebpackPlugin(),
    // HMR 特性所需要的插件
    // 生产环境不要开启
    // new HotModuleReplacementPlugin(),
    new DefinePlugin({
      API_BASE_URL: JSON.stringify('http://www.baidu.com')
    }),
    new MiniCssExtractPlugin()
    // new OptimizeCssAssetsWebpackPlugin()
  ],
  // devtool: 'cheap-module-eval-source-map', // source map 设置
  devtool: 'none', // source map 设置
  optimization: { // tree-shaking
    // 模块只导出被使用的成员
    usedExports: true,
    // 压缩输出结果
    // minimize: boolean
    minimizer: [
      // 压缩js， 因为css开启压缩，导致webpack以为js也需要手动配置
      new TerserWebpackPlugin(),
      new OptimizeCssAssetsWebpackPlugin()
    ],
    // 尽可能合并每一个模块到一个函数中
    concatenateModules: true,
    // 移除副作用代码，一些用不到的代码
    sideEffects: true
  }
} 

module.exports = config