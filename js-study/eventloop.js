/*
 * @LastEditors: Sinosaurus
 */ 

//  microtask jobs
/**
 * 1. Promise
 * 2. mutationObserver
 * 3. process.nextTick (node 独有)
 */
//  macrotask  task
/**
 * 1. setTimeout
 * 2. setInterval
 * 3. xhr
 * 4. script
 * 5. setImmediate
 * 6. I/O
 * 7. UI rendering
 */

console.log('script start')

async function async1() {
  await async2()
  console.log('async1 end')
}
async function async2() {
  console.log('async2 end')
}
async1()

setTimeout(function() {
  console.log('setTimeout')
}, 0)

new Promise(resolve => {
  console.log('Promise')
  resolve()
})
  .then(function() {
    console.log('promise1')
  })
  .then(function() {
    console.log('promise2')
  })

console.log('script end')