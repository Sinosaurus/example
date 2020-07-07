import fs from 'fs'
import path from 'path'
import * as babylon from 'babylon'
import traverse from 'babel-traverse'
import { transformFromAst } from 'babel-core'


interface InCode {
  filePath:string
  dependencies: string[]
  code:string | undefined
  relativePath?:string
}
function readCode (filePath: string):InCode {
  const content = fs.readFileSync(path.join(__dirname, filePath), 'utf-8')
  // create AST
  const ast = babylon.parse(content, { sourceType: 'module'})
  // find current file relation
  const dependencies:string[] = []
  traverse(ast, {
    ImportDeclaration: ({node}) => {
      dependencies.push(node.source.value)
    }
  })
  // ast compile to es5
  const { code } = transformFromAst(ast, undefined, { presets: ['env']})
  return {
    filePath,
    dependencies,
    code
  }
}

function getDependencies(entry:string):InCode[] {
  // read entry file
  const entryObject = readCode(entry)
  const dependencies = [entryObject]
  // for find all file relation
  for (const asset of dependencies) {
    // get file path
    const dirname = path.dirname(asset.filePath)
    // for get current file relation
    asset.dependencies.forEach(relativePath => {
      // get absolute path
      const absolutePath = path.join(dirname, relativePath)
      // css append to  style
      const cssRE = /\.css$/
      if (cssRE.test(absolutePath)) {
        const content = fs.readFileSync(absolutePath, 'utf-8')
        const emptyRE = /\\r\\n/g
        const code = `
          const style = document.createElement('style')
          style.innerText = ${JSON.stringify(content).replace(emptyRE, '')}
          document.head.appendChild(style)
        `
        dependencies.push({
          filePath: absolutePath,
          relativePath,
          dependencies: [],
          code
        })
      } else {
        // js
        const child = readCode(absolutePath)
        child.relativePath = relativePath
        dependencies.push(child)
      }
    })
  }
  return dependencies
}

function bundle(dependencies:InCode[], entry: string) {
  let modules = ''
  // create {'./entry.js': function (module, exports, require) {} }
  dependencies.forEach(dep => {
    const filePath = dep.relativePath || entry
    modules += `'${filePath}': (
      function (module, exports, require) { ${dep.code} }
    )`
  })
  // create require function
  const result = `
    (function (modules) {
      function require(id) {
        const module = { exports: {} }
        modules[id](module, module.exports, require)
        return module.exports
      }
      require('${entry}')
    })({${modules}})
  `
  // build file
  fs.writeFileSync(path.join(__dirname, '../dist/bundle.js',), result)
}

bundle(getDependencies('./entry.js'), './entry.js' )