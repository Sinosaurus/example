"use strict";
var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    Object.defineProperty(o, k2, { enumerable: true, get: function() { return m[k]; } });
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
}));
var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
});
var __importStar = (this && this.__importStar) || function (mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const fs_1 = __importDefault(require("fs"));
const path_1 = __importDefault(require("path"));
const babylon = __importStar(require("babylon"));
const babel_traverse_1 = __importDefault(require("babel-traverse"));
const babel_core_1 = require("babel-core");
function readCode(filePath) {
    const content = fs_1.default.readFileSync(path_1.default.join(__dirname, filePath), 'utf-8');
    // create AST
    const ast = babylon.parse(content, { sourceType: 'module' });
    // find current file relation
    const dependencies = [];
    babel_traverse_1.default(ast, {
        ImportDeclaration: ({ node }) => {
            dependencies.push(node.source.value);
        }
    });
    // ast compile to es5
    const { code } = babel_core_1.transformFromAst(ast, undefined, { presets: ['env'] });
    return {
        filePath,
        dependencies,
        code
    };
}
function getDependencies(entry) {
    // read entry file
    const entryObject = readCode(entry);
    const dependencies = [entryObject];
    // for find all file relation
    for (const asset of dependencies) {
        // get file path
        const dirname = path_1.default.dirname(asset.filePath);
        // for get current file relation
        asset.dependencies.forEach(relativePath => {
            // get absolute path
            const absolutePath = path_1.default.join(dirname, relativePath);
            // css append to  style
            const cssRE = /\.css$/;
            if (cssRE.test(absolutePath)) {
                const content = fs_1.default.readFileSync(absolutePath, 'utf-8');
                const emptyRE = /\\r\\n/g;
                const code = `
          const style = document.createElement('style')
          style.innerText = ${JSON.stringify(content).replace(emptyRE, '')}
          document.head.appendChild(style)
        `;
                dependencies.push({
                    filePath: absolutePath,
                    relativePath,
                    dependencies: [],
                    code
                });
            }
            else {
                // js
                const child = readCode(absolutePath);
                child.relativePath = relativePath;
                dependencies.push(child);
            }
        });
    }
    return dependencies;
}
function bundle(dependencies, entry) {
    let modules = '';
    // create {'./entry.js': function (module, exports, require) {} }
    dependencies.forEach(dep => {
        const filePath = dep.relativePath || entry;
        modules += `'${filePath}': (
      function (module, exports, require) { ${dep.code} }
    )`;
    });
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
  `;
    // build file
    fs_1.default.writeFileSync(path_1.default.join(__dirname, '../dist/bundle.js'), result);
}
bundle(getDependencies('./entry.js'), './entry.js');
