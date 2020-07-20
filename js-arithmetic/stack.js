// 入栈，出栈
/**
 * 1. 入栈 push
 * 2. 出栈 pop
 * 3. 检查栈顶 peek 
 * 4. 是否为空 isEmpty
 * 5. 个数 size
 * 6. 清空 clear
 */

// 入栈出栈思想
class Stack {
  // 私有属性
  #items = []
  push(val) {
    this.#items.push(val)
  }
  pop() {
    return this.#items.pop()
  }
  peek() {
    return this.#items[this.#items.length-1]
  }
  clear() {
    this.#items = []
  }
  isEmpty() {
    return this.#items.length === 0
  }
  size() {
    return this.#items.length
  }
}

function Stacks() {
  // 外部访问不到
  let items = []
  this.push = function (val) {
    items.push(val)
  }
  this.pop = function () {
    return items.pop()
  }
  this.peek = function () {
    return items[items.length-1]
  }
  this.clear = function () {
    items = []
  }
  this.isEmpty = function () {
    return items.length === 0
  }
  this.size = function () {
    return items.length
  }
}

/**
 * @description: 十进制转二进制
 * @param {number} num
 * @return: 二进制
 */
function tenTo2(num) {
  // 由于10转2进制，余数便是2进制需要的，但是遵循栈的思想，先进后出
  const s = new Stacks()
  // 入栈
  while (num > 0) {
    s.push(num % 2)
    num = Math.floor(num / 2)
  }
  let str2 = ''
  // 出栈
  while (!s.isEmpty()) {
    str2 += s.pop()
  }
  return str2
}

console.log(tenTo2(100))