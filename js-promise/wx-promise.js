/*
 * @LastEditors: Sinosaurus
 */ 
function Promise(fn) {
  this.cbs = []

  const resolve = value => {
    setTimeout(() => {
      this.data = value
      this.cbs.forEach(cb => cb(value))
    })
  }
  fn(resolve.bind(this))
}

Promise.prototype.then = function (onResolved) {
  return new Promise(resolve => {
    this.cbs.push(() => {
      const res = onResolved(this.data)
      if (res instanceof Promise) {
        res.then(resolve)
      } else {
        resolve(res)
      }
    })
  })
} 

new Promise(resolve => {
  setTimeout(function () {
    resolve(1)
  }, 150)
}).then(res => {
  console.log(res, 1)
  return new Promise(resolve => {
    setTimeout(() => {
      resolve(2)
    }, 300)
  })
}).then(res => {
  console.log(res, 2)
})

class MiniPromise {
  constructor (fn) {
    this.cbs = []
    this.data = ''
    fn(this.resolve.bind(this))
  }
  resolve (value) {
    setTimeout(() => {
      this.data = value
      this.cbs.forEach(cb => cb(value))
    })
  }
  then (onResolved) {
    return new MiniPromise(resolve => {
      this.cbs.push(() => {
        const res = onResolved(this.data)
        if (res instanceof MiniPromise) {
          res.then(resolve)
        } else {
          resolve(res)
        }
      })
    })
  }
}

new MiniPromise(resolve => {
  setTimeout(function () {
    resolve(`minipromise, 1`)
  }, 200)
}).then(res => {
  console.log(res)
  return new MiniPromise(resolve => {
    setTimeout(function () {
      resolve(`minipromise, 2`)
    }, 200)
  })
}).then(res => {
  console.log(res)
})