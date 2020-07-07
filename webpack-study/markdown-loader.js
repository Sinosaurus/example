const marked = require('marked')
module.exports = source => {
  console.log(source)
  // return `hello loader ~`
  const html = marked(source)
  const code = `module.exports = ${JSON.stringify(html)}`
  // 需要返回一段js字符串
  return code
}