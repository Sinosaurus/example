// weakMap
/**
 * weakMap 与 map 的区别
 * 1. 只接受 对象（null除外）为键名，其他类型不行
 * 2. 键名所指向的对象不计入 垃圾回收机制 （弱引用）
 */
 
//  注意只是键值弱引用
const wm = new WeakMap()
let key = {}
let obj = { foo: 1 }

wm.set(key, obj)
obj = null // 清除obj
console.log(wm.get(key), obj) // { foo: 1 }

key = null
console.log(wm.get(key)) // undefined

// api
/**不能遍历
 * set
 * has
 * get
 * delete
 */