// https://juejin.im/post/5e2168626fb9a0300d619c9e
class Promise {
  constructor(executor) {
    //不能相信用户的输入，所以这里要做参数效验
    if (typeof executor !== 'function') {
      throw new TypeError('Promise resolver ${executor} is not a function')
    }

    this.initValue()
    this.initBind()
    executor(this.resolve, this.reject)
  }
  //绑定 this
  initBind() {
    this.resolve = this.resolve.bind(this)
    this.reject = this.reject.bind(this)
  }
  //进行代码的优化
  initValue() {
    //记录状态和值的改变
    //初始化值
    this.value = null //终值
    this.reason = null //拒因
    this.state = 'pending' //状态
  }
  resolve(value) {
    //成功后的一系列操作（状态的改变，成功回调的执行）
    if (this.state === 'pending') {
      //状态进行改变
      this.state = 'fulfilled'
      //执行成功的回调，把终值进行赋值
      this.value = value
    }
  }
  reject(reason) {
    //失败后的一系列操作（状态的改变，失败回调的执行）
    if (this.state === 'pending') {
      //状态进行改变
      this.state = 'rejected'
      //执行成功的回调，把据因进行赋值
      this.reason = reason
    }
  }
  then(onFulfilled, onRejected) {
    //  参数效验
    if (typeof onFulfilled !== 'function') {
      onFulfilled = function (value) {
        return value
      }
    }
    if (typeof onRejected !== 'function') {
      onRejected = function (reason) {
        throw reason
      }
    }
    if (this.state === 'fulfilled') {
      onFulfilled(this.value)
    }
    if (this.state === 'rejected') {
      onRejected(this.reason)
    }
  }
}
module.exports = Promise
