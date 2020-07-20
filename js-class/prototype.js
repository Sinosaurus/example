/**
 * 1. 只有函数才有prototype， 实例只有 __proto__
 * 2. 函数式 Function 的实例， 函数的 prototype 是 Object 的实例
 * 3. Function.__proto__ === Function.prototype
 * 4. Object.prototype.__proto__ === null
 * 5. function Animal, Object 是 new Function() Animal.constructor, Object.constructor === Function
 * 
 * 1. 原型链的终点 null
 * 2. 函数有prototype， 实例有__proto__
 * 3. Function.constructor === Function
 * 4. Object 可以看成 function Object () {}
 * 5. 原型链通过 __proto__ 去找
 */
  const log = console.log
  const dir =console.dir

  function Animal () {

  }
  const animal = new Animal()

  const obj = {}

  log(`==== 实例 ===`)
  log(animal.constructor, `animal.constructor: Animal, ${animal.constructor === Animal}`)
  log(animal.__proto__, `animal.__proto__: Animal.prototype, ${animal.__proto__ === Animal.prototype}`)
  log(animal.prototype, 'animal.prototype: undefined')
  dir(animal)

  log(`==== Animal ===`)
  log(Animal.prototype, `Animal.prototype: Animal.prototype, ${Animal.prototype === Animal.prototype}`)
  log(Animal.prototype.__proto__, `Animal.prototype.__proto__: Object.prototype, ${Animal.prototype.__proto__ === Object.prototype}`)
  log(Animal.prototype.constructor, `Animal.prototype.constructor: Animal, ${Animal.prototype.constructor === Animal}`)
  log(Animal.constructor, `Animal.constructor: Function, ${Animal.constructor === Function}`)
  log(Animal.__proto__, `Animal.__proto__: Function.prototype, ${Animal.__proto__ === Function.prototype}`)
  dir(Animal)

  log(`=== Function ===`)
  log(Function.prototype, `Function.prototype: Function.prototype, ${Function.prototype === Function.prototype}`)
  log(Function.prototype.__proto__, `Function.prototype.__proto__: Object.prototype, ${Function.prototype.__proto__ === Object.prototype}`)
  log(Function.prototype.constructor, `Function.prototype.constructor: Function, ${Function.prototype.constructor === Function}`)
  log(Function.constructor, `Function.constructor: Function, ${Function.constructor === Function}`)
  log(Function.__proto__, `Function.__proto__: Function.prototype, ${Function.__proto__ === Function.prototype}`)
  dir(Function)

  log(`=== Object ===`)
  log(Object.prototype, `Object.prototype: Object.prototype, ${Object.prototype === Object.prototype}`) 
  log(Object.prototype.constructor, `Object.prototype.constructor: Object, ${Object.prototype.constructor === Object}`)
  log(Object.prototype.__proto__, `Object.prototype.__proto__: null, ${Object.prototype.__proto__ === null}`)
  log(Object.constructor, `Object.constructor: Function, ${Object.constructor === Function}`)
  log(Object.__proto__, `Object.__proto__: Function.prototype, ${Object.__proto__ === Function.prototype}`)
  dir(Object)  

  log(`=== obj ===`)
  log(obj.constructor, `obj.constructor: Object, ${obj.constructor === Object}`)
  log(obj.__proto__, `obj.__proto__: Object.prototype, ${obj.__proto__ === Object.prototype}`)
  log(obj.prototype, 'obj.prototype: undefined')
  dir(obj)

 