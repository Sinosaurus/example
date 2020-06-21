// effect: 效应
// stack: 累加
// track: 追踪 轨迹
const effectStack = []
const targetMap = new WeakMap() // 键为对象，弱引用，可以避免内存泄漏

function track(target, prop) {
  // 收集依赖
  const effect = effectStack[effectStack.length - 1] // 最后一个
  if (effect === undefined) return
  let depMap = targetMap.get(target)
  if (depMap === undefined) {
    depMap = new Map()
    targetMap.set(target, depMap)
  }
  let dep = depMap.get(prop)
  if (dep === undefined) {
    dep = new Set()
    depMap.set(prop, dep)
  }

  if (!dep.has(effect)) {
    // 新增依赖
    // 双向存储 方便查找
    dep.add(effect)
    effect.deps.push(dep)
  }
}

function trigger(target, prop, info) {
  // 数据变化后，通知更新，执行effect
  const depMap = targetMap.get(target)
  if (depMap === undefined) return
  const effects = new Set()
  const computedRunners = new Set()
  if (!prop) return
  const deps = depMap.get(prop)
  deps.forEach(effect => {
    if (effect.computed) computedRunners.add(effect)
    effects.add(effect)
  })
  effects.forEach(effect =>  effect())
  computedRunners.forEach(computed => computed())
}

function run(effect, fn, args) {
  // 新来的
  if (effectStack.indexOf(effect) === -1) {
    try {
      effectStack.push(effect)
      return fn(...args)
    } finally {
      effectStack.pop() // 执行完删除
    }
  }
}

function createReactiveEffect(fn, options = {}) {
  const effect = (...args) => run(effect, fn, args)
  // effect的配置
  effect.deps = []
  effect.computed = options.computed
  // lazy 用于 computed 配置
  effect.lazy = options.lazy
  return effect
}

function effect(fn, options = {}) {
  const e = createReactiveEffect(fn, options)
  // 不是懒执行
  if (!options.lazy) e()
  return e
}

function computed(fn) {
  // 特殊的 effect
  const runner = effect(fn, { computed: true, lazy: true })
  return {
    effect: runner,
    get value () {
      return runner()
    }
  }
}

const handler = {
  get(target, prop) {
    const res = Reflect.get(target, prop)
    track(target, prop)
    return typeof res === 'object' ? reactive(res) : res
  },
  set(target, prop, val) {
    const info = {
      oldValue: target[prop],
      newValue: val
    }
    const res = Reflect.set(target, prop, val)
    trigger(target, prop, info)
  }
}

function reactive(target) {
  return new Proxy(target, handler)
}
