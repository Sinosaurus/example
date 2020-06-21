import { readFileSync } from 'fs'
import path from 'path'
import koa from 'koa'
import * as compilerSfc from '@vue/compiler-sfc' // .vue 单文件
import * as compilerDom from '@vue/compiler-dom' // 模板

const app = new koa()

function rewriteImport (context:string) {
  return context.replace(/from ['|"]([^'"]+)['|"]/g, (s0, s1) => {
    console.log(s0, s1)
    if (s1[0] !== '.' && s1[1] !== '/') return `from '/@modules/${s1}'`
    return s0
  })
}

app.use(async ctx => {
  ctx.body = 'hello'
  const {url, query} = ctx.request
  if (url === '/') {
    ctx.type = 'text/html'
    ctx.body = readFileSync(path.resolve(__dirname, './index.html'), 'utf-8')
  } else if (url.endsWith('.js')) {
    const jsFilePath = path.resolve(__dirname, url.slice(1))
    ctx.type = 'application/javascript'
    const res = readFileSync(jsFilePath, 'utf-8')
    ctx.body = rewriteImport(res)
  } else if (url.startsWith('/@modules/')) {
    // node_modules
    const prefix = path.resolve(__dirname, 'node_modules', url.replace('/@modules/', ''))
    // 此处需要 package.json 里的参数 module 设置了具体的位置
    const module = require(prefix + '/package.json').module
    const modulePath = path.resolve(prefix, module)
    const res = readFileSync(modulePath, 'utf-8')
    ctx.type = 'application/javascript'
    ctx.body = rewriteImport(res)
  } else if (url.indexOf('.vue') > -1) {
    // vue文件 有可能携带参数
    console.log(url, 11)
    const vuePath = path.resolve(__dirname, url.split('?')[0].slice(1))
    const { descriptor } = compilerSfc.parse(readFileSync(vuePath, 'utf-8'))
    if (!query.type) {
      ctx.type = 'application/javascript'
      // 借用vue自导的compile框架 解析单文件组件，其实相当于vue-loader做的事情
      ctx.body = `
        const __script = ${descriptor.script && descriptor.script.content.replace('export default ','').replace(/\n/g,'')}
        import { render as __render } from "${url}?type=template"
        __script.render = __render
        export default __script
      `
    } else if (query.type === 'template') {
      const template = descriptor.template
      if (!template) return
      //  要在server端吧compiler做了
      const render = compilerDom.compile( template.content, { mode: 'module'}).code
      ctx.type = 'application/javascript'
      ctx.body = rewriteImport(render)
    }
  }
})

app.listen(3000, () => {
  console.log(`http://localhost:3000`)
})