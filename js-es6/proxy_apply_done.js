// apply 拦截函数的调用，call和apply操作
const log = console.log
// apply(target, targetContext, targetArray)
const h= {
  apply(target, ctx, args) {
    console.log(args, arguments)
    return Reflect.apply(...arguments)
  }
}


const target = function () {
  return `I am the target!`
}
const proxy = new Proxy(target, {
  apply() {
    return `I am the proxy!`
  }
})
log(proxy())

const twice = {
  apply(target, ctx, args) {
    log(args, Array.prototype.slice.apply(arguments))
    // arguments === target + ctx + args
    return Reflect.apply(...arguments) * 2
  }
}
function sum(left, right) {
  return left + right
}
const proxy1 = new Proxy(sum, twice)
log(proxy1(1, 2))
log(proxy1.call(null, 1, 2))
log(proxy1.apply(null, [7, 8]))