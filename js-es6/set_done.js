// set 类似 Array，但是成员唯一，没有重复

// 去重，添加
const s = new Set()
const arr = [1, 2, 3, 4, 5, 4, 3]
arr.forEach(n => s.add(n))
console.log(s, s.size)

// 一维数组去重
const deduplicate = arr => Array.from(new Set(arr))
// unique
console.log(deduplicate(arr), 9999)

// api
/**
 * add
 * delete 返回boolean，表示是否删除成功
 * has
 * clear 无返回值
 */
console.log(s)
console.log(s.add(99))
console.log(s.delete(1)) // true
console.log(s.delete(1)) // false
console.log(s.has(99))
console.log(s)
s.clear()

// 遍历
/**
 * keys() 遍历键名
 * values() 遍历键值
 * entries() 遍历键值
 * forEach() 遍历每个成员
 */
const newSet = new Set([1, 2, 3, 1, 2, 2, 4, 6, 5])
console.log(newSet.keys(), newSet.values(), newSet.entries())
newSet.forEach(item => console.log(item))
for (let item of newSet.entries()) {
  console.log(item, 'for')
}

// 生成数组
// Array.from(set, val => val * 2)
// Array.from(arrayLike [, fn [, thisArg]])
// Array.from([1, 2, 3], x => x + x)
// Array.from({length: 10}, (v, i) => i) // 0-9

