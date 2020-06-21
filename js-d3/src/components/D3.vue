<!--
 * @LastEditors: Sinosaurus
--> 
<template>
  <div> 
    <h1>{{msg}}</h1>
    <div id="d3"></div>
  </div>
</template>

<script>
import { onMounted  } from 'vue'
import useD3 from './useD3.js'
export default {
  props: {
    msg: String
  },
  setup () {
    const { testSelectOrSelectAll } = useD3()
    onMounted (function () {
      testSelectOrSelectAll()
    })
  }
}
</script>

<style lang="sass" scoped>

</style>