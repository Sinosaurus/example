/*
 * @LastEditors: Sinosaurus
 */
const log = console.log
/**
 * @description: 将传入的数字进行整除到不能有小数位置，并返回被整除的所有数据的数组
 * @param {number} num 正整数
 * @return: number[]
 */
function calc(num) {
  // 执行的范围在 2 ~ num 之间
  let number = num
  const list = []
  console.time('start')
  for (let i = 2; i < num; i++) {
    // 此时没有意义
    if (number < i) break
    if (number % i === 0) {
      number = number / i
      list.push(i)
      i = 1
    }
  }
  console.timeEnd('start')
  return list
}

log(calc(10)) // [2, 5]
log(calc(6)) // [2, 3]
log(calc(8)) // [2, 2, 2]
log(calc(68)) // [2, 2, 17]
log(calc(106)) // [2, 53]