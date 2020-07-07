/*
 * @LastEditors: Sinosaurus
 */ 
/**
 * 闭包
 */

for (var i = 0; i < 6; i++) {
  setTimeout(function () {
    console.log(i, 99)
  }, 16)
}

// 方法一
for (var i = 0; i < 6; i++) {
  ;(function (j) {
    setTimeout(function () {
      console.log(j, '闭包')
    }, 16)
  })(i)
}
// 方法一
for (var i = 0; i < 6; i++) {
  ;(function (j) {
    setTimeout(function () {
      console.log(j, '闭包')
    }, 16)
  })(i)
}
// 方法二
for (var i = 0; i < 6; i++) {
  setTimeout(function (j) {
    console.log(j, 'setTimeout第三个参数')
  }, 16, i)
}
// 方法三
for (let i = 0; i < 6; i++) {
  setTimeout(function () {
    console.log(i, 'let')
  }, 16)
}

/**
 * 拷贝
 */

// 浅拷贝
// 若是拷贝一层的对象，浅拷贝变相的也是深拷贝了
function clone (obj) {
  // return Object.assign({}, obj)
  return {...obj}
}

function cloneDeep (obj) {
  function isObject (o) {
    return typeof o === 'object' && o !== null
  }
  if (!isObject(obj)) throw new Error(`${obj} 不是对象`)
  const isArray = Array.isArray(obj)
  const newObject = isArray ? [...obj] : {...obj}
  Reflect.ownKeys(newObject).forEach(key => {
    newObject[key] = isObject(newObject[key]) ? cloneDeep(newObject[key]) : obj[key]
  })
  return newObject
}

// test clone
// 1
const obj = {
  a: {
    b: 2
  },
  c: 3
}
const clone1 = clone(obj)
clone1.a.b = '777'
console.log(clone1, obj, 'clone')
const clone2 = cloneDeep(obj)
clone2.a.b = '999'
console.log(clone2, obj, 'cloneDeep')