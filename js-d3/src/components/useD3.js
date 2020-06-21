/*
 * @LastEditors: Sinosaurus
 */ 
import { onMounted, reactive, toRefs } from 'vue'
import * as d3 from 'd3'
export default function useD3() {
  const state = reactive({
    
  })
  function testSelectOrSelectAll() {
    d3.select('#d3').text('我是d3')
  }

  return {
    ...toRefs(state),
    testSelectOrSelectAll
  }
}