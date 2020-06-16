// 拦截Object.preventExtensions() 必须返回一个布尔值，否则会被自动转为布尔值
// 必须有一个限制， 只有目标对象不可扩展（Object.isExtensible(proxy) 为 false， proxy.preventExtensions 才能返回true）
const log = console.log
const proxy = new Proxy({}, {
  preventExtensions(target) {
    return true
  }
})
// Object.preventExtensions(proxy) 并返回 proxy
// Object.preventExtensions(proxy) // 'preventExtensions' on proxy: trap returned truish but the proxy target is extensible
log(Object.isExtensible(proxy)) // true
const proxy1 = new Proxy({}, {
  preventExtensions(target) {
    log('called')
    Object.preventExtensions(target)
    return true
  }
})
log(Object.preventExtensions(proxy1))