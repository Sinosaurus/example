// weakSet
/**不能被遍历，因为随时会消失
 * 1. 成员必须是 对象，不能使其他类型的值
 * 2. weakSet的对象都是弱引用，即垃圾回收机制不考虑 WeakSet 对该对象的引用，如果其他对象都不再引用该对象，
 *   那么垃圾回收机制会自动回收改对象所占用的内存，不考虑改对象是否还存在于WeakSet中
 */
const ws = new WeakSet()
// ws.add(1) // Invalid value used in weak set

const a1 = [1, 2, 3]
// const ws1 = new WeakSet(a1)
// console.log(ws1) // Invalid value used in weak set

const a2 = [[1, 2], [1, 3], [1, 4]]
const ws2 = new WeakSet(a2)
console.log(ws2)

// api
/**
 * add
 * delete
 * has
 */

 /**
  * 用途
  * 1. 可以用来存储DOM节点，而不用担心这些节点从文档移除时会引发内存泄漏
  * 2. 判断
  */
//  2. 判断
const foos = new WeakSet()
class Foo {
  constructor() {
    foos.add(this)
  }
  method() {
    if (!foos.has(this)) {
      throw new TypeError(`Foo.prototype.method 只能在Foo的实例中调用！`)
    }
  }
}