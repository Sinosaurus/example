// 用于拦截 delete 操作
function invariant(key, action) {
  if (key[0] === '_') throw new Error(`Invalid attempt to "${action}" private "${key}" property`)
}
const handler = {
  deleteProperty(target, property) {
    invariant(property, 'delete')
    return true
  }
}

const target = {
  _prop: 'foo'
}

const proxy = new Proxy(target, handler)

// delete proxy._prop
const target1 = Object.defineProperty({}, '_prop', {
  configurable: false
})
// ......
const proxy1 = new Proxy(target1, handler)
delete proxy1._prop
