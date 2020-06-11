/**symbol
 * 由于es5的对象属性名都是 string， 这样容易导致 属性名 冲突。
 * 因而需要一种机制来保证每个属性名唯一。
 * 对象的属性名可以是两种类型
 * 1. string
 * 2. symbol
 */

let s = Symbol()
let s1 = Symbol()
console.log(s === s1) // false
console.log(typeof s)

// 参数 Symbol(string) 主要用来区分是哪一个Symbol
const s2 = Symbol('s2')
const s3 = Symbol('s3')
console.log(s2) // Symbol('s2)
console.log(s3) // Symbol('s3)

// Symbol 不能与其他类型的值进行运算
const s4 = Symbol('s4')
// const str = s4 + 'symbol' // TypeError: Cannot convert a Symbol value to a string

// 可以通过 下面的方式进行转换 再进行与其他值进行运算
// String
const s5 = Symbol('s5')
console.log(String(s5))
console.log(s5.toString())
// Boolean
const s6 = Symbol('s6')
console.log(Boolean(s6)) // true
console.log(!s6) // false
// Number
const s7 = Symbol('s6')
// console.log(Number(s7)) // Cannot convert a Symbol value to a number

/**
 * 综上
 * symbol 
 * 1. 转为 string
 *    1.1 String()
 *    1.2 toString()
 * 2. 转为 boolean
 *    2.1 Boolean()
 *    2.2 ! (取非)
 * 3. 其他无效
 */


 // 定义对象键
const key = Symbol()
// 方式1
const a1 = {}
a1[key] = 'hello symbol'
// 方式2 
const a2 = {
  [key]: 'hello symbol'
}
// 方式3
const a3 = {}
Object.defineProperty(a3, key, { value: 'hello symbol' })

console.log(a1[key], a2[key], a3[key])

// 注意：获取 symbol为键时，不能使用 .运算符, 只能使用 [symbol] 的方式来获取

// test
const s8 = Symbol()

const obj1 = {
  [s8]: function (arg) {}
}
obj1[s8]('我是参数')

const obj2 = {
  [s8] (arg) {}
}
obj2[s8]('我是参数')

// define const 可以保证常量唯一
const log = {
  levels: {
    DEBUG: Symbol('debug'),
    INFO: Symbol('info'),
    WARN: Symbol('warn')
  }
}
console.log(log.levels.DEBUG, 'debug message')
console.log(log.levels.INFO, 'info message')
console.log(log.levels.WARN, 'warn message')

// switch 是使用常量进行匹配的，若是使用 symbol 就更加ok
const COLOR_RED = Symbol()
const COLOR_GREEN = Symbol()

function getComplement(color) {
  switch (color) {
    case COLOR_GREEN:
      return 'green'
    case COLOR_RED:
      return 'red'
    default:
      throw new Error('Undefined color!')
  }
}

// 实例，消除魔术字符串
function getType(type) {
  switch (type) {
    case 'abc':
      return 1
    default:
      return 2
  }
}
// 上面的 abc 便是魔术字符串 若是想修改，便很麻烦

const TYPE = 'abc'
function getType1(TYPE, type) {
  switch (type) {
    case TYPE:
      return 1
    default:
      return 2
  }
}
// 上面这样便进行解耦了，getType1 不用去关心具体跟哪个值进行关联
// 只是需要多传一个参数

// 对上面的进行改造，因为 TYPE也是传入的判断
// 具体是什么，不用去关心，因而更合适用 symbol
const TYPE1 = Symbol()
function getType2(TYPE, type) {
  switch (type) {
    case TYPE:
      return 1
    default:
      return 2
  }
}

// 属性名遍历
/**
 * Symbol作为属性名时，不会出现在 for...in...、for...of...、Object.keys()、Object.getOwnPropertyNames()。
 * 可以通过 Object.getOwnPropertySymbols 获取所有 Symbol属性名
 */
const objMore = {
  [Symbol('key')]: 'Symbol--key',
  a: 'a',
  b: 'b'
}
console.log(Object.keys(objMore), Object.getOwnPropertyNames(objMore), Object.getOwnPropertySymbols(objMore))
// 方式1，获取所有key
console.log([
  ...Object.getOwnPropertyNames(objMore),
  ...Object.getOwnPropertySymbols(objMore)
])
// 方式2 Reflect
console.log(Reflect.ownKeys(objMore))

/**
 * 鉴于上面这种模式，可以使 symbol作为内部私有属性
 */

// Symbol.for() Symbol.keyFor()
// 希望用同一个Symbol值
const ss1 = Symbol.for('ss1')
const ss2 = Symbol.for('ss1')
const ss3 = Symbol('ss1')
console.log(ss1 === ss2) // true
console.log(ss1 === ss3) // false
/**
 * Symbol.for(string) 若是找到 string就用现有的，若是没有，就生成一个
 * Symbol.for 会被记录到全局，而 Symbol是不会的
 * 
 * Symbol.keyFor(Symbol) 可以获取 Symbol.for 的 key
 */
console.log(Symbol.keyFor(ss1), Symbol.keyFor(ss3)) // ss1 undefined

// 后面还有一些api，暂时略过