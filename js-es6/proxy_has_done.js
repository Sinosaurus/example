// has 用来拦截 HasProperty操作，即判断对象是否具有某个属性时，这个方法会生效。
// in 运算
const log = console.log
const handler = {
  has(target, property) {
    if (property[0] === '_') return false
    return property in target
  }
}
const target = {
  _prop: 'foo',
  prop: 'foo1'
}
const proxy = new Proxy(target, handler)
log('_prop' in proxy)
log('prop' in proxy)
log('p' in proxy)


const obj1 = { a: 10 }
Object.preventExtensions(obj1)

const p = new Proxy(obj1, {
  has(target, property) {
    return false
  }
})
// log('a' in p)  // has' on proxy: trap returned falsish for property 'a' but the proxy target is not extensible

// 对 for...in... 不生效
const student1 = {
  name: '张三',
  age: 18,
  score: 99
}
const student2 = {
  name: 'Sinosaurus',
  age: 11,
  score: 55
}
const handlers = {
  has(target, property) {
    if (property === 'score' && target[property] < 60) {
      log(`${target.name} 不及格`)
      return false
    }
    return property in target
  }
}

const studentProxy1 = new Proxy(student1, handlers)
const studentProxy2 = new Proxy(student2, handlers)

log('score' in studentProxy1)
log('score' in studentProxy2)

// 此处正常打印，并没有进行拦截
for (const a in studentProxy1) {
  log(studentProxy1[a])
}
for (const a in studentProxy2) {
  log(studentProxy2[a])
}