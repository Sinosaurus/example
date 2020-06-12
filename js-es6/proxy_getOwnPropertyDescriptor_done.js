//  Object.getOwnPropertyDescriptor() 方法返回指定对象上一个自有属性对应的属性描述符。（自有属性指的是直接赋予该对象的属性，不需要从原型链上进行查找的属性）
// 拦截 Object.getOwnPropertyDescriptor()  返回一个属性描述对象或者 undefined
const log = console.log
const handler = {
  getOwnPropertyDescriptor(target, property) {
    if (property[0] === '_') return
    return Object.getOwnPropertyDescriptor(target, property)
  }
}
const target = {
  _foo: 'bar',
  baz: 'tar'
}
const proxy = new Proxy(target, handler)
log(Object.getOwnPropertyDescriptor(proxy, 'wat')) // undefined

log(Object.getOwnPropertyDescriptor(proxy, '_foo')) // undefined

log(Object.getOwnPropertyDescriptor(proxy, 'baz')) // { value: 'tar', writable: true, enumerable: true, configurable: true }
