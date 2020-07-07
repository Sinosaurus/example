
class RemoveCommentsWebpackPlugin {
  apply(compiler) {
    const plugin = {
      name: 'RemoveCommentsWebpackPlugin'
    };
    console.log('RemoveCommentsWebpackPlugin 启动')
    compiler.hooks.emit.tap(plugin, compilation => {
      for (const key in compilation.assets) {
        // 生成后的文件 key
        // 只处理js里的 comment
        if (key.endsWith('.js')) {
          const contents = compilation.assets[key].source() // 输出文件内容
          const commentRE = /\/\*{2,}\/\s?/g
          const noCommentContents = contents.replace(commentRE, '')
          compilation.assets[key] = {
            source: () => noCommentContents,
            size: () => noCommentContents.length
          }
        }
      }
    });
  }
}

module.exports = RemoveCommentsWebpackPlugin