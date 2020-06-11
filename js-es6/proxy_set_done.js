const person = new Proxy({}, {
  set(obj, prop, value) {
    if (prop === 'age') {
      if (!Number.isInteger(value)) throw new TypeError('The age is not an integer')
      if (value > 200) throw new RangeError('The age seems invalid!')
    }
    obj[prop] = value
  }
})
person.age = 100
// 可以用来校验是否合理
console.log(person.age)

/**
 * 判断 _开头的属性不能被外部使用
 */
function invariant(key, action) {
  // key[0] === '_'
  if (key.indexOf('_') === 0) throw new Error(`Invalid attempt to ${action} private ${key} property`)
}
const handler = {
  get(target, property) {
    invariant(property, 'get')
    return target[property]
  },
  set(target, property, value) {
    invariant(property, 'set')
    target[property] = value
    return true
  }
}
const target1 = {}

const proxy1 = new Proxy(target1, handler)
// proxy1._prop
proxy1._prop = 2222