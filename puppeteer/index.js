/*
 * 爬虫
 * @LastEditors: Sinosaurus
 */
const puppeteer = require('puppeteer')
const path = require('path')
const fs = require('fs')

;(async () => {
  const browser = await puppeteer.launch({
    headless: false,
    // 忽略 https 的错误
    // ignoreHTTPSErrors: true,
    slowMo: 100,
    // defaultViewport: {
    //   width: 1440,
    //   height: 1366
    // }
  });
  const page = await browser.newPage()
  console.log(await '准备前往目的地')
  try {
    // http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2019/index.html
    await page.goto(path.join(__dirname, "./index.html"))
    const select = 'a'
    // await page.waitForSelector(select)
    // const res = await page.$eval(select, el => {
    //   const list = Array.from(el.querySelectorAll('a'))
    //   const result = list.map(item => {
    //     return {
    //       text: item.innerText.trim()
    //     }
    //   })
    //   return {
    //     result,
    //     count: list.length
    //   }
    // })
    await page.waitForSelector(select)

    const linkList = await page.$$(select)
    console.log(linkList.length)
    const province = []
    linkList.forEach(async item => {
      await console.log(item, 11111111)
      await province.push(item.innerText)
      await page.click(item)
      await page.waitFor(2000)
    })
    const pages = await browser.pages()
    console.log(pages.length, 'pages')
  } catch (err) {
    throw err
  }
})()