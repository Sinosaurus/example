import { ref, onMounted, onUnmounted } from 'vue'
export default function useScroll() {
  const top = ref(0)
  function update() {
    top.value = window.scrollY
  }
  onMounted(() => {
    window.addEventListener('scroll', throttle(update, 300))
  })
  onUnmounted(() => {
    window.removeEventListener('scroll', update)
  })
  return {
    top
  }
}

function throttle(fn, wait) {
  let lastTime
  let timerId
  return function(...args) {
    let currentTime = Date.now()
    if (lastTime + wait < currentTime || !lastTime) {
      lastTime = currentTime
      fn.apply(this, args)
    } else {
      clearTimeout(timerId)
      timerId = setTimeout(() => {
        fn.apply(this, args)
      }, wait)
    }
  }
}
