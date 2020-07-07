import { isObject } from './../shared/utils'
import { mutableHandler } from './baseHandler'

export function reactive (target) {
  // 创建一个响应式的对象
  return createReactiveObject(target, mutableHandler)
}
function createReactiveObject (target, baseHandler) {
  if (!isObject(target)) return target
  const observed = new Proxy(target, baseHandler)
  return observed
}