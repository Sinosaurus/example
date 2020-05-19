/*
 * @LastEditors: Sinosaurus
 */
const fs = require('fs')
const path = require('path')


console.log('start')
try {
  const data = fs.readFileSync(path.join(__dirname, '2.txt'), 'utf8')
  const res = data.trim().split('\n')
  console.log(res)
  const indexs = []
  const titles = []
  const titleReg = /@.*@/g
  res.forEach((item, index) => {
    if (titleReg.test(item)) {
      indexs.push(index)
    }
  })
  indexs.push(res.length)

  const items = []
  for (let i = 0; i < indexs.length; i++) {
    const first = indexs[i]
    const end = indexs[i + 1]
    if (!end) break
    // slice 不包括end数据
    items.push(res.slice(first, end))
  }
  console.log(items)
  // console.log(items,items.length)
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
          const date = new Date()
          const dateStr = `${date.getFullYear()}${String(date.getMonth() + 1).padStart(2, '0')}${String(date.getDate()).padStart(2, '0')}`
          valObj.img =  dateStr + arr[0].trim()
          // 还需要加一个图片的标识
          // valObj.alt = 
          valObj.title = arr[1].trim()
          valObj.subTitle = arr[2].trim()
          valObj.href = arr[3].trim()
          obj.child.push(valObj)
        }
      })
      console.log(obj.child.length)
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
