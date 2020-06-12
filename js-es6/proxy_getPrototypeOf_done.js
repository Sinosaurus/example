// 用来拦截获取对象原型

// Object.prototype.__proto__
// Object.prototype.isPrototypeOf()
// Object.getPrototypeOf()
// Reflect.getPrototypeOf()
// instanceof

const proto = {}
const proxy = new Proxy({}, {
  getPrototypeOf(target) {
    return proto
  }
})
console.log(Object.getPrototypeOf(proxy) === proto)

console.log(proxy.__proto__ === proto)