// api本身明明可以使用自身属性，为何要用 Reflect 来进行获取
/**
 * https://zh.javascript.info/proxy
 */

// Reflect API 旨在补充 Proxy。对于任意 Proxy 陷阱，都有一个带有相同参数的 Reflect 调用。我们应该使用它们将调用转发给目标对象。