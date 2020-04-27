/*
 * @LastEditors: Sinosaurus
 */
const fs = require('fs')
const path = require('path')


console.log('start')
try {
  const data = fs.readFileSync(path.join(__dirname, '1.txt'), 'utf8')
  const res = data.split('\n')
  const indexs = []
  const titles = []
  const titleReg = /@.*@/g
  res.forEach((item, index) => {
    if (titleReg.test(item)) {
      indexs.push(index)
    }
  })
  indexs.push(res.length - 1)
  const items = []
  for (let i = 0; i < indexs.length; i++) {
    const first = indexs[i]
    const end = indexs[i + 1]
    if (!end) break
    items.push(res.slice(first, end))
  }
  console.log(items.length)
  const result = []
  items.forEach(item => {
    if (Array.isArray(item)) {
      const obj = {
        child: []
      }
      item.forEach(val => {
        const valObj = {}
        if (titleReg.test(val)) {
          obj.title = val.replace(/[@\t\r]/g, '')
        } else {
          const arr = val.trim().split(',')
          valObj.img = arr[0].trim()
          // 还需要加一个图片的标识
          // valObj.alt = 
          valObj.title = arr[1].trim()
          valObj.subTitle = arr[2].trim()
          valObj.href = arr[3].trim()
          obj.child.push(valObj)
        }
      })
      result.push(obj)
    }
  })
  fs.writeFile(path.join(__dirname, 'result.js'), 'const arr =' + JSON.stringify(result, null, 2), 'utf-8', err => {
    if (err) throw new Error(err)
    console.log('save ok')
  })
} catch (err) {
  throw new Error(err)
}
console.log('end')
