// import { createApp } from 'vue';
// import App from './App.vue'

// createApp(App).mount('#app')

// 自定义
import { createRenderer } from '@vue/runtime-dom'

import App from './App.vue'

function createCanvasApp (...args) {
  const app = createRenderer().createApp(...args)
  const { mount } = app
  app.mount = mount
}

createCanvasApp(App).mount('#app')