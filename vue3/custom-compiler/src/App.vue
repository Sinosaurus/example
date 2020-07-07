<template>
  <div>
    <circle :data="data" :x="100" :y="100" :r="50"/>
  </div>
</template>

<script>
import { reactive } from 'vue'
export default {
  name: 'App',
  setup () {
    const state = reactive({
      data: [
        { type: 'Math', score: 100, color: 'red'}
      ]
    })
    return {
      state
    }
  }
}
</script>