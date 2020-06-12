// 拦截对象自身属性的读取操作
// Object.getOwnPropertyNames()
// Object.getOwnPropertySymbols()
// Object.keys()
const log = console.log

const target = {
  a: 1,
  b: 2,
  c: 3
}
const handler = {
  ownKeys(target) {
    return ['a']
  }
}

const proxy = new Proxy(target, handler)
log(Object.keys(proxy)) // ['a']

const target1 = {
  _bar: '_bar',
  _prop: '_prop',
  bar: 'bar',
  prop: 'prop'
}

const handler1 = {
  ownKeys(target) {
    // console.log(target, 111)
    return Reflect.ownKeys(target).filter(key => key[0] !== '_')
  }
}

const proxy1 = new Proxy(target1, handler1)

for (const key of Object.keys(proxy1)) {
  log(target1[key])
}

// Object.keys  有三类属性会被 ownKeys 方法自动过滤，不会返回
/**
 * 目标对象上不存在的属性
 * 属性名为Symbol值
 * 不可遍历（enumerable）的属性
 */

const target2 = {
  a: 1,
  b: 2,
  c: 3,
  [Symbol.for('secret')]: '4'
}
Object.defineProperty(target2, 'f', {
  enumerable: false,
  configurable: true,
  writable: true,
  value: 5
})

console.log(target2, 'target2')

const handler2 = {
  ownKeys(target) {
    console.log(target, 'handler2')
    return ['a', 'd', Symbol.for('secret'), 'key']
  }
}

const proxy2 = new Proxy(target2, handler2)
log(Object.keys(proxy2), 'proxy2')
log(Object.keys(target2), 'target2')

// Object.getOwnPropertyNames()
const proxy3 = new Proxy({}, {
  ownKeys(target) {
    return ['a', 'b', 'c']
  }
})
log(Object.getOwnPropertyNames(proxy3), 'proxy3')

// ownKeys 方法返回的数组成员只能是 string | Symbol值。如果有其他类型的值，或者返回的根本不是数组就会报错
const target4 = {}
const proxy4 = new Proxy(target4, {
  ownKeys(target) {
    return [123, true, undefined, null, {}, [], Symbol()]
  }
})
// log(Object.getOwnPropertyNames(proxy4)) // 123 is not a valid property name

const target5 = {}
Object.defineProperty(target5, 'a', {
  configurable: false,
  enumerable: true,
  value: 10
})
const proxy5 = new Proxy(target5, {
  ownKeys(target) {
    return ['b'] // 若是包含 a 就不会报错
  }
})
// log(Object.getOwnPropertyNames(proxy5)) // 'ownKeys' on proxy: trap result did not include 'a' 

const target6 = {
  a: 1
}
Object.preventExtensions(target6)
const handler6 = {
  ownKeys(target) {
    return ['a', 'b']
  }
}
const proxy6 = new Proxy(target6, handler6)
log(Object.getOwnPropertyNames(proxy6)) // ownKeys' on proxy: trap returned extra keys but proxy target is non-extensible
