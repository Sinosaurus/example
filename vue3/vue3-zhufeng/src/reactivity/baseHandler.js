import { isObject, hasOwn } from "../shared/utils"
import { reactive } from './reactive' 
import { track, trigger } from './effect'
const log = console.log
const get = createGetter()
const set = createSetter()

export const mutableHandler = {
  get,
  set
}

function createGetter () {
  return function get (target, key, receiver) {
    const rd =  Reflect.get(target, key, receiver)
    // TODO:
    if(isObject(rd)) {
      return reactive(rd)
    }
    track(target, key)
    return rd
  }
}
function createSetter () {
  return function set (target, key, value, receiver) {
    // TODO:
    /**需要判断 
     * 1. 修改属性还是新增属性
     * 2. 原来的值与新值是否相同
     * 
     * eg： 在使用数组push时，会被代理两次，第一次调用push方法，第二次修改length长度。因而需要避免这类问题
     */
    const hasKey = hasOwn(target, key)
    const oldValue = target[key]  // Reflect.get(target, key)
    // 此时才进行修改 
    const rd = Reflect.set(target, key, value, receiver)
    if (!hasKey) {
      // log(`新增属性 target: ${JSON.stringify(target)} key: ${key}`)
      trigger(target, key, 'add')
    } else if (value !== oldValue) {
      // log(`值修改`) 
      trigger(target, key, 'update')
    }
    return rd
  }
}
