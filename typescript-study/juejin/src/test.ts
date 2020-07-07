// 反向映射
enum Direction {
  Up,
  Down,
  Left,
  Right
}

console.log(`
  Direction.Up: ${Direction.Up}
  Direction[0]: ${Direction[0]}
`)
/**
 * Direction.Up: 0
 * Direction[0]: Up
 */

const enum Directions {
  Up = 'Up',
  Down = 'Down',
  Left = 'Left',
  Right = 'Right'
}
const a = Directions.Up
console.log(`a: ${a}`)

// 联合枚举类型
enum Direction1 {
  Up,
  Down,
  Left,
  Right
}

let b: Direction1
/**
 * 此时b只能是
 * Direction1.Up | Direction1.Down | Direction1.Left | Direction1.Right
 */
enum Animal {
  Dog,
  Cat
}

b = Direction1.Up
console.log(`b: ${b}`) // 0
// b = 1
// console.log(b)
// b = 5
// console.log(b)
// b = Animal.Dog

enum Animal1 {
  Dog
}
enum Animal1 {
  Cat = 1
}