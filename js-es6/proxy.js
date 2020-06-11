/**
 * 在目标对象前假设一个 ‘拦截’ 层，外界对该对象的访问都必须先通过
 * 这层拦截，因此提供了一种机制可以对外界的访问进行过滤和改写。
 */

const obj = new Proxy({}, {
  get(target, key, receiver) {
    console.log(`getting ${key}`)
    return Reflect.get(target, key, receiver)
  },
  set(target, key, value, receiver) {
    console.log(`setting ${key}`)
    return Reflect.set(target, key, value, receiver)
  }
})

obj.count = 1

++obj.count

console.log(obj.count)

// proxy 支持如下操作
/**
 * get
 * set
 * has
 * deleteProperty
 * ownKeys
 * getOwnPropertyDescriptor
 * defineProperty
 * preventExtensions
 * getPrototypeOf
 * isExtensible
 * setPrototypeOf
 * apply
 * construct
 */

