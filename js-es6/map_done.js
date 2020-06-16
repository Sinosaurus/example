// map
/**
 * 由于对象的键只能是 string、Symbol而无法使用其他类型 字符串 -- 值
 * 因而map 改为le 值--值，是一种更完善的 Hash结构
 */

const m = new Map()
const obj = {
  p: 'llll'
}
m.set(obj, '键是obj')
console.log(m.get(obj))
obj.m = '新加了键，从来来判断是引入地址还是拷贝对象...'
console.log(m.get(obj))
// 无论 obj 的键值是否变化，只要obj存在，就可以一直拿到 ===> 内存地址

// api
/**
 * set  设置
 * get  获取
 * has  是否存在 返回boolean
 * delete 删除 返回boolean
 * clear
 * size
 */
const m1 = new Map([
  ['name', 'Sinosaurus'],
  ['age', 18]
])
console.log(m1) // { 'name' => 'Sinosaurus', 'age' => 18 }

// 类似 双元素数组结构  [[a, b], [c, d]]
const set = new Set([
  ['foo', 1]
])
const m2 = new Map(set)
console.log(set, m2)

// 键唯一。 重名，后来覆盖前面

// 遍历
/**
 * keys()
 * values()
 * entries()
 * forEach()
 */

// 跟 set类似