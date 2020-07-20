/*
 * @LastEditors: Sinosaurus
 */ 
function cached(fn) {
  // 创建一个空对象
  var cache = Object.create(null);
  // 获取缓存对象str属性的值，如果该值存在，直接返回，不存在调用一次fn，然后将结果存放到缓存对象中
  return (function cachedFn(str) {
      var hit = cache[str];
      return hit || (cache[str] = fn(str))
  })
}

const a = cached(function (val) {
  return val
})
a(1)
a(1)
a(1)