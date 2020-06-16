// 链接：https://juejin.im/post/59ac1c4ef265da248e75892b
function clone (src) {
  const dst = {};
  for (const prop in src) {
    dst[prop] = src[prop]
  }
  return dst;
}
