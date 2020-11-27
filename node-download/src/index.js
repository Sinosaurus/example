/*
 * @Descripttion: 
 * @Author: 李世龙
 * @Date: 2020-11-27 14:12:49
 * @LastEditors: 李世龙
 * @LastEditTime: 2020-11-27 16:25:20
 */

const Koa = require('koa')
const Serve = require('koa-static');
const fs = require('fs');
// const os = require('os');
const path = require('path')
const koaBody = require('koa-body');
const Router = require('koa-router')
const send = require('koa-send')
const app = new Koa()
const router = new Router()
 
app.use(router.routes())
app.use(router.allowedMethods())
app.use(koaBody({ multipart: true }));

// logger

app.use(async (ctx, next) => {
  await next()
  const rt = ctx.response.get('X-Response-Time')
  console.log(`${ctx.method} ${ctx.url} - ${rt}`)
})

// x-response-time
app.use(async (ctx, next) => {
  const startTime = Date.now()
  await next()
  const ms = Date.now() - startTime
  ctx.set('X-Response-Time', `${ms}s`)
})

// app.use(async (ctx, next) => {
//   await next();
//   if (ctx.body || !ctx.idempotent) return;
//   ctx.redirect('/404.html');
// });

// app.use(Serve(path.join(__dirname, '/public')));

// https://www.jianshu.com/p/79f1b3671cf0
router.get('/download', async ctx => {
  const filename = '你不知道的js.pdf'
  ctx.set("Content-Disposition", "filename=" + encodeURI('你不知道的js.pdf'), 'urf8');
  // ctx.attachment(filename);
  console.log(ctx)
  await send(ctx, 'src/public/你不知道的JavaScript（上卷） - 副本_wrapper.pdf')
})


// handle uploads

// app.use(async function(ctx, next) {
//   // ignore non-POSTs
//   if ('POST' != ctx.method) return await next();
//   console.log(ctx.request, 'request')
//   const file = ctx.request.files.file;
//   const reader = fs.createReadStream(file.path);
//   const stream = fs.createWriteStream(path.join(os.tmpdir(), Math.random().toString()));
//   reader.pipe(stream);
//   console.log('uploading %s -> %s', file.name, stream.path);

//   ctx.redirect('/');
// });

app.listen(7777, () => {
  console.log(`Server running at http://localhost:7777`)
})