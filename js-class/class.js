// /*
//  * @LastEditors: Sinosaurus
//  */ 

//  // 私有方法

//  class Person {
//    foo (baz) {
//       bar.call(this, baz)
//    }
//    static create (v) {
//      console.log(this, 999)
//     //  Person.foo(v)
//      if (this.snaf) {
//        console.log(1)
//      } else {
//        console.log(2)
//      }
//    }
//  }
// function bar (baz) {
//   console.log(baz)
//    this.snaf = baz
// }

// const p1 = new Person()
// // console.log(p1.snaf, '999')
// // Person.create('99')

// const method = Symbol('method')
// const params = Symbol('params')

// class User {
//   static [method]() {
//     if (!this[params]) this[params] = new User()
//     return this[params]
//   }
// }

// const r = User[method]()
// console.dir(r)
// console.log(r)

class Storage {
  // 获取方法
  // get(key){
  //     return localStorage.getItem(key)
  // }
  // // 存储方法
  // set(key,value){
  //     return  localStorage.setItem(key,value)
  // }
  // 外部调用此函数实例化
  
  static getInstance() {
      if (!Storage.instance) {
          Storage.instance = new Storage
      }
      return Storage.instance
  }
}
Storage.instance = null


const Storage1 = new Proxy(Storage, {
  get (target, propKey, receiver) {
    console.log(propKey, '1')
    if (propKey == 'instance') throw new Error(`${propKey} 不存在`)
    return target[propKey]
  },
  set (target, propKey, value) {
    if (propKey === 'instance') throw new Error(`${propKey} 不存在`)
    Reflect.set(target, propKey, value)
  }
  // getPrototypeOf (target, key) {
  //   console.log(target, key)
  // }
})

let store = Storage1.getInstance()
// Storage1.instance = 111
// 此处需要考虑 instance 变为私有属性
let store1 = Storage1.getInstance()

console.log(store === store1)
