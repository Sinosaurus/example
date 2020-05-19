const fakes = require('fake-stock-market-generator')

const fs = require('fs')
// Array.from({ length: 20 }, (v, i) => i);
//  [...Array(20).keys()]
const stocks = [...Array(20).keys()]/*生成 0-19 20个数字*/.map(i => {
  return fakes.generateStockData(10)
})

fs.writeFileSync('stocks.json', JSON.stringify(stocks, null, 2))