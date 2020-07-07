/*
 * @LastEditors: Sinosaurus
 */ 
class Person {}
console.log(Person instanceof Function)

/**
 * 继承
 */

 // 组合式继承
 
 function Parent (val) {
   this.value = val
   console.log(val, 'parent')
 }
 Parent.prototype.getData = function (data) {
   console.log(data, this)
 }
 function Child (val) {
   Parent.call(this, val)
 }
 // 此处导致 Child 继承了 Parent所有的属性
 Child.prototype = new Parent()

 const child1 = new Child('child')
 console.log(child1)
 child1.getData(1)
 console.log(child1 instanceof Parent, 999)

  // 寄生组合式继承
 
  function Parent1 (val) {
    this.value = val
    console.log(val, 'parent')
  }
  Parent1.prototype.getData = function (data) {
    console.log(data, this)
  }
  function Child1 (val) {
    Parent.call(this, val)
  }
  // 此处可以避免 父元素也有value
  Child1.prototype = Object.create(Parent1.prototype, {
    constructor: {
      value: Child1,
      enumerable: false,
      writable: true,
      configurable: true
    }
  })
  const child2 = new Child1()
  console.log(child2)

  // class 继承
  class Parent2 {
    constructor (val) {
      this.val = val
    }
    getData () {
      console.log(this.val)
    }
  }

  class Child2 extends Parent2 {
    constructor(val) {
      super(val)
    }
  }
  const child3 = new Child2(2)
  child3.getData()
  console.log(child3)