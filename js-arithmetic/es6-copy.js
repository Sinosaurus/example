const log = console.log
// class SetCopy {
//   #items = {}
//   has(value) {
//     // 使用 hasOwnProperty 主要用来检查自身属性
//     // 而不会通过原型链进行查找
//     return this.#items.hasOwnProperty(value)
//   }
//   add(value) {
//     if (this.has(value)) {
//       // 已存在
//       return false
//     } else {
//       this.#items[value] = value
//       return true
//     }
//   }
//   remove(value) {
//     if (this.has(value)) {
//       delete this.#items[value]
//       return true
//     } else {
//       return null
//     }
//   }
//   clear() {
//     this.#items = {}
//   }
//   size() {
//     let length = 0
//     for (const key in this.#items) {
//       length++
//     }
//     return length
//   }
//   values() {
//     const result = []
//     for (const key in this.#items) {
//       // 此处感觉不用，写了跟没写没区别
//       // if (this.has(key)) {
//         result.push(this.#items[key])
//       // }
//     }
//     return result
//   }
//   // 并集
//   union(other) {
//     const result = new SetCopy()
//     const v1 = this.values()
//     const v2 = other.values()
//     v1.forEach(item => {
//       result.add(item)
//     })
//     v2.forEach(item => {
//       result.add(item)
//     })
//     return result
//   }
//   // 交集
//   intersection(other) {
//     const result = new SetCopy()
//     // 虽然是交集，但是感觉应该先判断length
//     // 这样可以尽少循环次数
//     const v2 = other.values()
//     v2.forEach(item => {
//       if (this.has(item)) {
//         result.add(item)
//       }
//     })
//     return result
//   }
//   // 差集
//   difference(other) {
//     const result = new SetCopy()
//     const v1 = this.values()
//     v1.forEach(item => {
//       if (!other.has(item)) {
//         result.add(item)
//       }
//     })
//     return result
//   }
//   getItems() {
//     return this.#items
//   }
// }

// const s1 = new SetCopy()
// s1.add(1)
// s1.add(2)
// s1.add(3)
// const s2 = new SetCopy()
// s2.add(2)
// s2.add(3)
// s2.add(4)

// log(s1.union(s2))
// log(s1.intersection(s2))
// log(s1.difference(s2))

// 验证下delete是否消耗性能
/**
 * 由于使用原来的方式，就是重新生成一个数据，
 * 但是目前看来，使用delete耗时反而比
 * 新生成一个数据快，特别是删除多个时
 */

// const emptyObj = {
// }
// const baseStr = `abcdefghijklmnopqrstuvwsyz`
// baseStr.split('').forEach(item => {
//   emptyObj[item] = ''
// })
// const deleteStr = `abcdefag`

// function deleteObj() {
//   console.time('delete')
//   deleteStr.split('').forEach(item => {
//     delete emptyObj[item]
//   })
//   console.timeEnd('delete')
// }
// function deleteObj1() {
//   const arr = []
//   baseStr.split('').forEach(item => {
//     if (!deleteStr.includes(item)) arr.push(item)
//   })
  
//   const obj = {}
//   console.time('delete')
//   arr.forEach(item => {
//     obj[item] = ''
//   })
//   console.timeEnd('delete')
// }
// // deleteObj()
// deleteObj1()
/**
 * test set WeakSet
 */
let o1 = {
  name: 1
}
let o2 = {
  name:2
}
let o3 = {
  name: 3
}
const set1 = new Set()
const set2 = new WeakSet()

set1.add(o1)
log(set1.has(o1))
o1 = null
log(set1.has(o1))
// set2.add(o2)
// log(set2.has(o2))
// o2 = null
// log(set2.has(o2))
