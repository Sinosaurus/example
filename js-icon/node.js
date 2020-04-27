'use strict'

const path = require('path')
const fs = require('fs')

fs.readFile(path.resolve(__dirname,'icon/iconfont.css'), 'utf8', (err, data) => {
  if (err) throw new Error(err)
  const result = data.split('\n')
  const iconList = []
  result.forEach(item => {
    if (item.includes('.icon-')) {
      const r = item.replace(/:before.*/, '')
      iconList.push(r.substring(1))
    }
  })
  fs.writeFile(path.join(__dirname, 'icon/className.json'), JSON.stringify(iconList, null, 2), 'utf8', err => {
    if (err) throw new Error(err)
    console.log('okx`')
  })
})