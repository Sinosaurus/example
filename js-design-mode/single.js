const INSTANCE = Symbol('instance')
class SingleMode {
  static createInstance() {
    if (!SingleMode[INSTANCE]) {
      SingleMode[INSTANCE] = new SingleMode()
    }
    return SingleMode[INSTANCE]
  }
}
const SingleModeProxy = new Proxy(SingleMode, {
  set(target, key, value) {
    console.log(target)
    if (key === INSTANCE) throw new Error(`禁止修改 instance`)
    return Reflect.set(target, key, value)
  }
})
const s1 = SingleModeProxy.createInstance()
// SingleModeProxy.instance = null
const s2 = SingleModeProxy.createInstance()
// 此处会有一点点问题， 因为 instance 并不似私有属性，导致外部可以进行修改访问
// 可以通过 proxy进行拦截
console.log(s1 === s2)

/**
 * 采用闭包的方式进行处理
 * 自调用函数
 */
SingleMode.getInstance = (function () {
  // 模拟私有属性
  let instance = null
  return function () {
    if (!instance) {
      instance = new SingleMode()
    }
    return instance
  }
})();
const s3 = SingleMode.getInstance()
const s4 = SingleMode.getInstance()
console.dir(SingleMode)
console.log(s3 === s4)

// ============ demo =============

class SingleStorage {
  static createStorage() {
    if (!SingleStorage[INSTANCE]) {
      SingleStorage[INSTANCE] = new SingleStorage()
    }
    return SingleStorage[INSTANCE]
  }
  getItem(key) {
    return localStorage.getItem(key)
  }
  setItem(key, value) {
    return localStorage.setItem(key, value)
  }
}
const sto1 = SingleStorage.createStorage()
const sto2 = SingleStorage.createStorage()

sto1.setItem('name', 'sinosaurus')
console.log(sto2.getItem('name'), 99999)

function SingleStorageClosure() {
  
}
SingleStorageClosure.prototype.getItem = function (key) {
  return localStorage.getItem(key)
}
SingleStorageClosure.prototype.setItem = function (key, value) {
  return localStorage.setItem(key, value)
}
// 静态方法 
// 若是放在 prototype和 SingleStorageClosure 都会出现递归，一直都会有
const Storage = (function () {
  let instance = null
  return function createInstance() {
    if (!instance) instance = new SingleStorageClosure()
    return instance
  }
})();
console.dir(SingleStorageClosure)
// 使用自调用函数，可以减少一个（）x
const sot3 = Storage()
const sot4 = Storage()
sot3.setItem('aa', 'bb')
console.log(sot4.getItem('aa'))