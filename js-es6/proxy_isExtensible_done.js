// 拦截 Object.isExtensible
const log = console.log

const target = {}
const proxy = new Proxy(target, {
  isExtensible(target) {
    console.log('called')
    return true
  }
})
log(Object.isExtensible(proxy))

log(Object.isExtensible(proxy) === Object.isExtensible(target))