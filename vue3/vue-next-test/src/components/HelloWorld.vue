<template>
  <div class="hello">
    <h1>分解滚动到指定位置时，输入框悬浮于顶部</h1>
    <fieldset :class="{ 'is-fixed': top > 200 }">
      {{ top }}
      <legend>我是需要悬浮于顶部的输入框</legend>
      <input v-model="newTodo" type="text" />
      <button @click="addTodo">添加</button>
    </fieldset>
    <ul>
      <li
        :class="{ 'horizontal-line': item.completed }"
        @click="toggle(index)"
        v-for="(item, index) in todos"
        :key="item.id"
      >
        {{ item.title }}
      </li>
    </ul>
    <p>待完成:{{ remaining }}</p>
  </div>
</template>

<script>
import useScroll from './useScroll'
import useAddTodo from './useAddTodo'
export default {
  name: 'HelloWorld',
  setup() {
    const { top } = useScroll()
    const todo = useAddTodo()
    return {
      ...todo,
      top
    }
  }
}
</script>
<style>
ul {
  list-style: none;
}
li {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #eee;
  cursor: pointer;
}
.horizontal-line {
  text-decoration: line-through;
}
.is-fixed {
  position: fixed;
  top: 0;
  left: 0;
}
</style>
