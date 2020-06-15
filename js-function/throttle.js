function throttle (fn, wait) {
  let lastTime, // 最后时间
      deferTimer // 定时器id
  return function (...args) {
    let currentTimer = Date.now()
    /**
     * 1. 第一次进来 lastTime没值，执行一下
     * 2. 上次时间跟wait时间 已经小于现在时间，表示已经超过需要等待的时间，因而可以直接执行
     */
    if (!lastTime || currentTimer >= lastTime + wait) {
      lastTime = currentTimer
      // 执行
      fn.apply(this, args)
    } else {
      clearTimeout(deferTimer)
      deferTimer = setTimeout(() => {
        lastTime = currentTimer
        fn.apply(this, args)
      }, wait)
    }
  }
}