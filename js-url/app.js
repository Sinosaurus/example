/*
 * @LastEditors: Sinosaurus
 */
const url = require('url')

const urls = {
  pathname: 'http://www.sinnet-cloud.cn/index.html?remember=1&q=2',
  hash: 'http://www.sinnet-cloud.cn/#/index?remember=1&q=2'
}

for (const key in urls) {
  console.log(url.parse(urls[key]))
}