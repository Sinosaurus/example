let Vue // bind on install
export class Store {}
export function install(_Vue) {
  if (Vue && _Vue === Vue) {
    return
  }
  Vue = _Vue
  applyMixin(Vue)
}

function applyMixin (Vue) {
  Vue.mixin({ beforeCreate: vuexInit })

  /**
   * Vuex init hook, injected into each instances init hooks list.
   */

  function vuexInit () {
    const options = this.$options
    // store injection
    if (options.store) {
      this.$store = typeof options.store === 'function'
        ? options.store()
        : options.store
    } else if (options.parent && options.parent.$store) {
      this.$store = options.parent.$store
    }
  }
}