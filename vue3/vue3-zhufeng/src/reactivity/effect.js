export function effect (fn, options = {}) {
  const effect = createReactiveEffect(fn, options)
  if (!options.lazy) {
    effect()
  }
  return effect
}

let uid = 0
let activeEffect
const effectStack = []
function createReactiveEffect (fn, options) {
  const effect = function reactiveEffect () {
    // 避免重复
    if (effectStack.includes(effect)) return // 避免重复执行
    try {
      activeEffect = effect
      effectStack.push(effect)
      return fn()
    } finally {
      effectStack.pop(effect) // 执行完清楚
      activeEffect = effectStack[effectStack.length - 1]
    }
  }
  effect.options = options
  effect.id = uid++
  effect.deps = []
  return effect
}

// 依赖收集

/**
 * 收集依赖，需要通过key-value模式进行关联，这样当key发生变化，value才能执行
 * 而目前key不可能是简单的字符串，有可能是 object，因而只能是用 map等方式
 */
const targetMap = new WeakMap() // 弱引用，不存在内存泄漏
export function track (target, type, key) {
  if (activeEffect === undefined) return // 不需要依赖effect
  let depsMap = targetMap.get(target)
  if (!depsMap) targetMap.set(targetMap, (depsMap = new Map()))
  let dep = depsMap.get(key)
  if (!dep) depsMap.set(key, (dep = new Set()))
  // 相互关联
  if (!dep.has(activeEffect)) {
    dep.add(activeEffect)
    activeEffect.deps.push(dep)
  }
}
// 触发依赖
export function trigger (target, type, key, value, olbValue) {
 
}