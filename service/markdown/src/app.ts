/*
 * @LastEditors: Sinosaurus
 */

import path from "path";
import fs from "fs";
import marked from "marked";
import walkdir from "walkdir";
import config from "./../config/index";
import Koa from 'koa'
const app = new Koa()

let templates = `
  <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>{{{styles}}}</style>
    </head>
    <body>
        <div class="wy">{{{content}}}</div>
    </body>
  </html>`;

async function walk(srcPath: string) {
  let result = await walkdir.async(srcPath, { return_object: true });
  const mdPaths: string[] = [];
  Object.entries(result).forEach(([path, fileStatus]) => {
    if (!fileStatus.isDirectory() && path.match(/\.md$/gi)) {
      mdPaths.push(path);
    }
  });
  return mdPaths;
}

function createFileName (srcFile:string) {
  const file = srcFile.split('/').pop()
  return file?.replace(/md$/, 'html')
}

function createHtmlFile(targetFile: string) {
  const fileName = createFileName(targetFile)
  fs.watchFile(targetFile, { interval: 200 }, (curr, prev) => {
    // 根据时间 判断文件是否变化
    if (curr.mtime === prev.mtime) return false;
    fs.readFile(targetFile, "utf8", (err, data) => {
      if (err) throw err;
      let html = marked(data);
      fs.readFile(path.join(__dirname, "github.css"), "utf8", (err, css) => {
        console.log(path.join(__dirname, config.dist + fileName), '1234567890')
        if (err) throw err;
        html = templates
          .replace("{{{content}}}", html)
          .replace("{{{styles}}}", css);
        fs.writeFile(
          path.join(__dirname, config.dist + fileName),
          html,
          "utf8",
          (err) => {
          }
        );
      });
    });
  });
}
function parseMDToHTML(paths: string[]) {
  let indexData = [];
  for (let i = 0; i < paths.length; i++) {
    createHtmlFile(paths[i])
  }
}

async function start () {
  const paths = await walk(config.targetUrl)
  parseMDToHTML(paths)
}


app.use(async ctx => {
  start()
  ctx.body = fs.readFileSync(path.join(__dirname, './../index.html'), 'utf-8');
});

app.listen(3000);
console.log('http://localhost:3000')