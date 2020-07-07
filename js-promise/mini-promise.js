/*
 * @LastEditors: Sinosaurus
 */ 

 const PENDING = 'pending'
 const RESOLVED = 'resolved'
 const REJECTED = 'rejected'

 function miniPromise(fn) {
   const that = this
   that.state = PENDING
   that.value = null
   that.resolvedCallbacks = []
   that.rejectedCallbacks = []

   function resolve (value) {
     if (value instanceof miniPromise) {
       return value.then(resolve, reject)
     }
     setTimeout(() => {
      if (that.state === PENDING) {
        that.state = RESOLVED
        that.value = value
        that.resolvedCallbacks.map(cb => cb(that.value))
      }
     }, 0)
   }
   function reject (value) {
     setTimeout(() => {
      if (that.state === REJECTED) {
        that.state === REJECTED
        that.value = value
        that.rejectedCallbacks.map(cb => cb(that.value))
      }
     }, 0)
   }
   try {
     fn(resolve, reject)
   } catch(e) {
     reject(e)
   }
 }
 
 // then
 miniPromise.prototype.then = function (onFulfilled, onRejected) {
   const that = this
   // 可以让数据进行透传，拿到什么返回什么
   onFulfilled = typeof onFulfilled === 'function' ? onFulfilled : val => val
   onRejected = typeof onRejected === 'function' ? onRejected : err => { throw err}

   if (that.state === PENDING) {
     return (promise2 = new miniPromise((resolve, reject) => {
       that.resolvedCallbacks.push(() => {
         try {
           const x = onFulfilled(that.value)
           resolutionProcedure(promise2, x, resolve, rejct)
         } catch (r) {
           reject(r)
         }
       })
       that.rejectedCallbacks.push(() => {
         try {
           const x = onRejected(that.value)
           resolutionProcedure(promise2, x, resolve, reject)
         } catch(r) {
           reject(r)
         }
       })
     }))
     that.rejectedCallbacks.push(onRejected)
   }

   if (that.state === RESOLVED) {
     return (promise2 = new miniPromise((resolve, reject) => {
       setTimeout(() => {
         try {
           const x = onFulfilled(that.value)
           resolutionProcedure(promise2, x, resolve, reject)
         } catch (r) {
           reject(r)
         }
       }, 0)
     }))
   }

   if (that.state === REJECTED) {
     onRejected(that.value)
   }

   function resolutionProcedure (promise2, x, resolve, reject) {
     if (promise2 === x) {
       return reject(new TypeError('Error'))
     }
     if (x instanceof miniPromise) {
       x.then(value => {
        resolutionProcedure(promise2, value, resolve, reject)
       }, reject)
     }
     let called = false
     if (x !== null && (typeof x === 'object' || typeof x === 'function')) {
       try {
         let then = x.then
         if (typeof then === 'function') {
           then.call(x, y => {
             if (called) return
             called = true
             resolutionProcedure(promise2, x, resolve, reject)
           }, e => {
             if (called) return
             called = true
             reject(e)
           })
         } else {
           resolve(x)
         }
       } catch (e) {
         if (called) return
         called = true
         reject(e)
       }
     } else {
      resolve(x)
    }
   } 
 }

 new miniPromise((resolve, reject) => {
   setTimeout(() => {
     resolve(1)
   }, 0)
 }).then(val => {
   console.log(val)
 })