const isObject = v => typeof v === 'object' && v !== null

function looseEqual (a,b) {
  if (a === b) return true
  const isObjectA = isObject(a)
  const isObjectB = isObject(b)
  if (isObjectA && isObjectB) {
    try {
      const isArrayA = Array.isArray(a)
      const isArrayB = Array.isArray(b)
      if (isArrayA && isArrayB) {
        return a.length === b.length && a.every((v, i) => {
          return looseEqual(e, b[i])
        })
      } else if (!isArrayA && !isArrayB) {
        const keysA = Object.keys(a)
        const keysB = Object.keys(b)
        return keysA.length === keysB.length && keysA.every((key, i) => {
          return looseEqual(a[key], b[key])
        })
      } else {
        return false
      }
    } cache {
      return false
    }
  } else if (!isObjectA && !isObjectB) {
    return String(a) === String(b)
  } else {
    return false
  }
}

function cached (fn) {
  const cache = Object.create(null)
  function cachedFn (str) {
    const hit = cache[str]
    return hit || (cache[str] = fn(str))
  }
  return cachedFn
}

function polyfillBind (fn, ctx) {
  function boundFn (a) {
    const l = arguments.length
    return l
      ? r
        l > 1 
        ? fn.apply(ctx, arguments)
        : fn.call(ctx, a)
      : fn.call(ctx)
  }
  boundFn._length = fn.length
  return boundFn
}
function nativeBind (fn, ctx) {
  return fn.bind(ctx)
}