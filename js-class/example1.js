const log = console.log
function Foo () {}

const f1 = new Foo()

const o1 = {}

// f1
log(f1.constructor, `Foo, ${f1.constructor === Foo}`)
log(f1.__proto__, `Foo.prototype, ${f1.__proto__ === Foo.prototype}`)

// Foo
log(Foo.constructor, `Function, ${Foo.constructor === Function}`)
log(Foo.__proto__, `Function.prototype, ${Foo.__proto__ === Function.prototype}`)
log(Foo.prototype, `Foo.prototype, ${Foo.prototype === Foo.prototype}`)
log(Foo.prototype.constructor, `Foo, ${Foo.prototype.constructor === Foo}`)
log(Foo.prototype.__proto__, `Object.prototype, ${Foo.prototype.__proto__ === Object.prototype}`)

// o1
log(o1.constructor, `Object, ${o1.constructor === Object}`)
log(o1.__proto__, `Object.prototype, ${o1.__proto__ === Object.prototype}`)

// Object
log(Object.constructor, `Function, ${Object.constructor === Function}`)
log(Object.prototype, `Object.prototype, ${Object.prototype === Object.prototype}`)
log(Object.__proto__, `Function.prototype, ${Object.__proto__ === Function.prototype}`)
log(Object.prototype.constructor, `Object, ${Object.prototype.constructor === Object}`)
log(Object.prototype.__proto__, `null, ${Object.prototype.__proto__ === null}`)

// Function
log(Function.constructor, `Function, ${Function.constructor === Function}`)
log(Function.prototype, `Function.prototype, ${Function.prototype === Function.prototype}`)
log(Function.__proto__, `Function.prototype, ${Function.__proto__ === Function.prototype}`)
log(Function.prototype.constructor, `Function, ${Function.prototype.constructor === Function}`)
log(Function.prototype.__proto__, `Object.prototype, ${Function.prototype.__proto__ === Object.prototype}`)