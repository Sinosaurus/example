// 拦截 defineProperty

const handler = {
  defineProperty(target, property, descriptor) {
    return false
 } 
}
const target = {}
const proxy = new Proxy(target, handler)
proxy.foo = 'bar' // 添加失败， target 依旧为空 proxy也为空

const newTarget = {}
Object.defineProperty(newTarget, 'foo', {
  writable: false,
  configurable: false,
  value: 11
})
const proxy1 = new Proxy(newTarget, handler)
proxy1.foo
console.log(newTarget, proxy1) // {} {}