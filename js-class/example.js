// /*
//  * @LastEditors: Sinosaurus
//  */ 
//  // Object = new Function()
//   // Animal = new Function()

//   function A () {}
//   Object.prototype.a = function () { console.log('a') }
//   Function.prototype.b = function () { console.log('b') }
//   const a = new A()
//   a.a() // alert
//   console.log(a.b) // undefined

//   console.log(a instanceof A) // true
//   console.log(A.prototype === Object.prototype)
//   console.log(a instanceof Object) // true
//   console.log(a instanceof Function) // false
//   console.log(Object.prototype === Function)
//   console.log(Object instanceof Function) // true


  // instanceof 到底是以 __proto__ 还是以 prototype

  function copyInstanceOf (obj, constructor) {
    // if (typeof obj !== 'object' || obj !== null  || constructor === null) return false
    let proto = obj.__proto__
    while (true) {
      console.log(proto, 'proto')
      if (proto === null) return false
      // if (proto === constructor.prototype) return true
      proto = proto.__proto__
    }
  }

  function Fn () {}
  const f1 = new Fn()
  const o1 = {}
  
  
  console.log(copyInstanceOf(o1))
  // f1
  // 1. f1的构造函数 f1.__proto__ => Fn.prototype
  // 2. Fn.prototype => Object.prototype
  // 3. Object.prototype.__proto__ => null
  // o1
  // 1. o1.__proto__ => Object.prototype
  // 2. Object.prototype => null
