<!--
 * @LastEditors: Sinosaurus
--> 
# 防抖节流

## debounce 防抖函数
防抖函数，主要用于 一直在运行的事件停下时执行的操作

```js
function debounce (fn, wait) {
  let timerId
  return function (...args) {
    clearTimeout(timerId)
    timerId = setTimeout(() => {
      fn.apply(this, args)
    }, wait)
  }
}
```
> 函数在运行时，就不断清除定时器，从新开始，知道停止操作时后的 wait 才会执行

## throttle 节流函数
节流函数，主要用于 一直运行的事件，隔断时间执行一下

```js
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
```
> 上面的函数，第一次会执行，然后隔断时间执行一遍


## 参考链接
+ [掘金 lodash](https://juejin.im/post/5daca250e51d457819286ad8)