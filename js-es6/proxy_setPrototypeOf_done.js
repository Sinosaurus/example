// 拦截 Object.setPrototypeOf
const handler = {
  setPrototypeOf(target, prototype) {
    throw new Error('Changing the prototype is forbidden')
  }
}
const obj = {}
const target = function () { }
const proxy = new Proxy(target, handler)
// https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Global_Objects/Object/setPrototypeOf

// 给 proxy 的原型挂上 obj
Object.setPrototypeOf(proxy, obj) // 修改原型

