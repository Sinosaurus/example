<template>
  <div id="app">
    <button @click="increment">
      Count is: {{ state.count }}, double is: {{ state.double }}
    </button>
    <HelloWorld />
  </div>
</template>

<script>
import { reactive, computed } from 'vue'
import HelloWorld from './components/HelloWorld'
export default {
  name: 'App',
  components: {
    HelloWorld
  },
  setup() {
    const state = reactive({
      count: 0,
      double: computed(() => state.count * 2)
    })
    function increment() {
      state.count++
    }
    return {
      state,
      increment
    }
  }
}
</script>

<style>
#app {
  min-height: 200vh;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
