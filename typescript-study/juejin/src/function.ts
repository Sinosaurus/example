/*
 * @LastEditors: Sinosaurus
 */

// 可选参数
function add (a:number, b?:number) {
  return a + (b || 0)
}
console.log(add(1, 3))

// 默认参数
function add1 (a: number, b = 1) {
  return a + b
}

console.log(add1(1))


function add2 (a: number, ...rest: number[]) {
  return rest.reduce((a, n) => a + n ,a)
}

console.log(add2(1, 2, 23, 4))