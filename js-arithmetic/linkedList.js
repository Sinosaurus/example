/**
 * 链表
 * head
 * length
 * 
 * 
 * 
 * 1. insert  插入
 * 2. append  尾部添加
 * 3. indexOf 获取元素索引
 * 
 * 4. remove 移除某项
 *    indexOf
 *    removeAt
 * 5. removeAt 在特定位置移除某项
 */

//  node.next = null // 链表尾部

class LinkNode {
  constructor(element) {
    this.element = element
    this.next = null
  }
}
class LinkLists {
  // 头
  #head = null
  // length
  #length = 0
  append(element) {
    const node = new LinkNode(element)
    if (this.#head === null) {
      this.#head = node
    } else {
      let current = this.#head
      while (current.next) {
        current = current.next
      }
      current.next = node
    }
    this.#length++
  }
  insert(position, element) {
    if (position < 0) return
    if (position > this.#length) {
      this.append(element)
      return
    }
    const node = new LinkNode(element)
    if (position === 0) {
      const current = this.#head
      this.#head = node
      node.next = current
    } else {
      let index = 0
      let current = this.#head
      let previous = null
      while (index < position) {
        previous = current
        current = current.next
        index ++
      }
      previous.next = node
      node.next = current
    }
    this.#length++
  }
  removeAt(position) {
    if (position >= this.#length || position < 0) return null
    if (position === 0) {
      let current = this.#head
      this.#head = current.next
      this.#length--
      return  current
    } else {
      let previous = null
      let index = 0
      let current = this.#head
      while (index < position) {
        previous = current
        current = current.next
        index++
      }
      previous.next = current.next
      length--
      return current
    }
  }
  indexOf(element) {
    let index = 0
    let current = this.#head
    // 需要保证current有值，不然循环完了
    while (current) {
      if (current.element === element) {
        return index
      }
      current = current.next
      index++
    }
    return -1
  }
  remove(element) {
    const index = this.indexOf(element)
    return this.removeAt(index)
  }
  getHead() {
    return this.#head
  }
  isEmpty() {
    return this.length === 0
  }
  size() {
    return this.length
  }
}

const linkList = new LinkLists()

linkList.append(1)
linkList.append(3)
linkList.append(5)
linkList.append(7)
linkList.append(9)
linkList.insert(99, 99)
// console.log(linkList.getHead())
// console.log(linkList.removeAt(3))
// console.log(linkList.getHead())
console.log(linkList.remove(99))