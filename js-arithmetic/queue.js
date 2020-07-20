/**
 * 队列： 先进先出
 * 
 * enqueue 入列
 * dequeue 出列
 * front 查看头
 */


class Queue {
  #items = []
  enqueue(n) {
    this.#items.push(n)
  }
  dequeue() {
    return this.#items.shift()
  }
  front() {
    return this.#items[0]
  }
  isEmpty() {
    return this.#items.length === 0
  }
  size() {
    return this.#items.length
  }
  clear() {
    this.#items = []
  }
}


/**
 * @description: 击鼓传花 每几下淘汰一人，传完❀的人就跑到队列尾部
 * @param {number} list
 * @param {num} 传几下
 * @return: 最终胜者
 */
function JGCH(list, num) {
  const q = new Queue()
  // create queue
  list.forEach(item => {
    q.enqueue(item)
  })
  // 淘汰人
  let del = null
  while (q.size() > 1) {
    for (let i = 0; i < num; i++) {
      q.enqueue(q.dequeue())
    }
    del = q.dequeue()
    console.log(`淘汰人员 ${del}`)
  }
  return q.front()
}
const list = ['a', 'b', 'c', 'd', 'e', 'f']
console.log(`最终胜者：${JGCH(list, 3)}`)

// 优先级  priority
class CreatePriority {
  constructor(name, priority) {
    this.name = name
    this.priority = priority
  }
}
class PriorityQueue {
  #items = []
  enqueue(name, priority) {
    const createPriority = new CreatePriority(name, priority)
    let isAdded = false
    for (let i = 0; i < this.#items.length; i++) {
      if (createPriority.priority > this.#items[i].priority) {
        this.#items.splice(i, 0, createPriority)
        isAdded = true
        break
      }
    }
    if (!isAdded) {
      this.#items.push(createPriority)
    }
  }
  getItems() {
    return this.#items
  }
}

const que = new PriorityQueue()
que.enqueue('张三', 7)
que.enqueue('li三',17)
que.enqueue('张wu', 9)
que.enqueue('ii三', 3)
console.log(que.getItems())