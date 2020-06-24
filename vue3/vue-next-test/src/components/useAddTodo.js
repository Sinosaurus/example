/*
 * @LastEditors: Sinosaurus
 */
import { reactive, computed, toRefs } from 'vue'
export default function() {
  const state = reactive({
    newTodo: '',
    todos: [
      { id: 1, title: 'eat', completed: false },
      { id: 2, title: 'write code', completed: false }
    ]
  })
  const remaining = computed(
    () => state.todos.filter(todo => !todo.completed).length
  )
  function addTodo() {
    state.todos.push({
      id: Math.random(),
      title: state.newTodo,
      completed: false
    })
    state.newTodo = ''
  }
  function toggle(i) {
    state.todos[i].completed = !state.todos[i].completed
  }
  return {
    addTodo,
    remaining,
    toggle,
    ...toRefs(state)
  }
}
