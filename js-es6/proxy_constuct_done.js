// 用于拦截 new 命令
// construct(target:目标对象, args: 构建函数的参数对象)
// construct 返回的必须是一个对象
const log = console.log

const proxy = new Proxy(function () { }, {
  construct(target, args) {
    console.log(`called: ${args.join(', ')}`)
    return {
      value: args[0] * 10
    }
  }
})

log((new proxy(1)).value)
// const proxy1 = new Proxy({}, { //  proxy1 is not a constructor
const proxy1 = new Proxy(function () {}, {
  construct(target, args) {
    console.log(`target: ${target}; args: ${args}`)
    return 1 // 'construct' on proxy: trap returned non-object ('1')
  }
})
log(new proxy1(1))