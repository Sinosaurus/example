const jsdom = require('jsdom')
const { JSDOM } = jsdom

const {
  document
} = (new JSDOM('')).window

console.dir(document)

const person = {
  name: 'Sinosaurus'
}
const proxy = new Proxy(person, {
  get(target, property) {
    if (property in target) return target[property]
    throw new ReferenceError('person 不包含这个属性')
  }
})

// 使用 proxy来获取属性名
console.log(proxy.name)
// console.log(proxy.age)

// receiver: 接收器

// 继承
const proto0 = new Proxy({}, {
  get(target, propertyKey, receiver) {
    console.log('GET===' + propertyKey, 1111)
    return target[propertyKey]
  }
})
const proto1 = Object.create(proto0)
proto1.a

// testing
function createArray(...elements) {
  const handler = {
    get(target, propertyKey, receiver) {
      let index = Number(propertyKey)
      if (index < 0) {
        // 输入负数就倒过来返回，类似 indexOf -1 的效果
        propertyKey = String(target.length + index)
      }
      return Reflect.get(target, propertyKey, receiver)
    } 
  }
  const target = []
  target.push(...elements)
  return new Proxy(target, handler)
}

const arr = createArray('a', 'b', 'c')
console.log(arr[-1], arr[0])

// 链式操作

const pipe = (function () { // 自调用
  return function (value) {
    const funStack = []
    const proxy = new Proxy({}, {
      get(pipeObject, fnName) {
        if (fnName === 'get') {
          return funStack.reduce(function (val, fn) {
            return fn(val)
          }, value)
        }
        funStack.push(fnList[fnName])
        return proxy
      }
    })
    return proxy
  }
}());
const double = n => n * 2
const pow = n => n * n
const reverseInt = n => n.toString().split('').reverse().join('') | 0
const fnList = {
  double,
  pow,
  reverseInt
}
console.log(pipe(3).double.pow.reverseInt.get) // 63

// 使用 get拦截实现一个生成各种DOM节点的通用函数dom
const dom = new Proxy({}, {
  get(target, property) {
    return function (attrs = {}, ...children) {
      const el = document.createElement(property)
      for (const prop of Object.keys(attrs)) {
        el.setAttribute(prop, attrs[prop])
      }
      for (let child of children) {
        if (typeof child === 'string') {
          child = document.createTextNode(child)
        }
        el.appendChild(child)
      }
      return el
    }
  }
})

const el = dom.div({}, 'Hello, my name is', dom.a({ href: '//' }, 'mark'))
console.log(el)
document.body.appendChild(el)

// 属性配置了 configurable writable  则该属性不能被代理
const target1 = Object.defineProperties({}, {
  foo: {
    value: 12222,
    writable: false,
    configurable: false
  }
})

const proxy3 = new Proxy(target1, {
  get(target, property) {
    return 'abc'
  }
})

proxy3.foo // 'get' on proxy: property 'foo' is a read-only and non-configurable data property on the proxy target but the proxy did not return its actual value (expected '12222' but got 'abc')
