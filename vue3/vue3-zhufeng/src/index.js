/*
 * @LastEditors: Sinosaurus
 */ 
import { reactive, effect, computed, ref } from './reactivity'

const state = reactive({
  name: 1,
  list: [1, 2, 3]
})
// 此时因为就只是一个普通的对象，并没有使用 proxy 进行包裹，因而需要判断，若还是对象，便需要递归
// console.log(state.list, 'log')

// 值发生变化就会触发
effect(() => {
  console.log(state.name, '变化执行')
})

// state.list.push(4)
state.name = 222