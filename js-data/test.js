/*
 * @LastEditors: Sinosaurus
 */

/**
 * 栈
 */ 
class Stack {
  constructor () {
    this.stack = []
  }
  push (item) {
    this.stack.push(item)
  }
  pop () {
    this.stack.pop()
  }
  peek () {
    return this.stack[this.getCount() - 1]
  }
  getCount () {
    return this.stack.length
  }
  isEmpty () {
    return this.getCount() === 0
  }
}

/**
 * 队列
 */
// 单联队列
class Queue {
  constructor () {
    this.queue = []
  }
  enQueue (item) {
    this.queue.push(item)
  }
  deQueue () {
    this.queue.shift()
  }
  getHeader () {
    return this.queue[0]
  }
  getCount () {
    return this.queue.length
  }
  isEmpty () {
    return this.getCount() === 0
  }
}

// 循环队列
class SqQueue {
  constructor (length) {
    this.queue = new Array(length + 1)
    // header
    this.first = 0
    // end
    this.last = 0
    // size
    this.size = 0
  }
  enQueue (item) {
    if (this.first === (this.last + 1) % this.queue.length) {
      this.resize(this.getCount() * 2 + 1)
    }
    this.queue[this.last] = item
    this.size++
    this.last = (this.last + 1) % this.queue.length
  }
  deQueue () {
    if (this.isEmpty()) throw Error(`Queue is empty`)
    let r = this.queue[this.first]
    this.queue[this.first] = null
    this.first = (this.first + 1) % this.queue.length
    this.size--
    if (this.size === this.getCount() / 4 && this.getCount() / 2 !== 0) {
      this.resize(this.getCount() / 2)
    }
    return r
  }
  getHeader () {
    if (this.isEmpty()) throw new Error(`Queue is empty`)
    return this.queue[this.first]
  }
  getCount () {
    return this.queue.length - 1
  }
  resize (length) {
    const q = new Array(length)
    for (let i = 0; i < length; i++) {
      q[i] = this.queue[(i + this.first) % this.queue.length]
    }
    this.queue = 1
    this.first = 0
    this.last = this.size
  }
  isEmpty () {
    return this.first === this.last
  }
}

/**
 * 链表
 */
class Node {
  constructor (v, next) {
    this.value = v
    this.next = next
  }
}

class LinkList {
  constructor () {
    this.size = 0

    this.dummyNode = new Node(null, null)
  }
  find (header, index, currentIndex) {
    if (index === currentIndex) return header
    return this.find(header.next, index, currentIndex + 1)
  }
  addNode (v, index) {
    this.checkIndex(index)
    
    const prev = this.find(this.dummyNode, index, 0)
    prev.next = new Node(v, prev.next)
    this.size++
    return prev.next
  }
  insertNode (v, index) {
    return this.addNode(v, index)
  }
  addToFirst (v) {
    return this.addNode(v, 0)
  }
  addToLast (v) {
    return this.addNode(v, this.size)
  }
  removeNode (index, isLast) {
    this.checkIndex(index)
    index = isLast ? index - 1 : index
    const prev = this.find(this.dummyNode, index, 0)

    const node = prev.next
    prev.next = node.next
    node.next = null

    this.size--
    return node
  }
  removeFirstNode () {
    return this.removeNode(0)
  }
  removeLastNode () {
    return this.removeNode(this.size, true)
  }
  checkIndex (index) {
    if (index < 0 || index > this.size) throw new Error(`Index error`)
  }
  getNode (index) {
    this.checkIndex(index)
    if (this.isEmpty()) return
    return this.find(this.dummyNode, index, 0).next
  }
  isEmpty () {
    return this.size === 0
  }
  getSize () {
    return this.size
  }
}

/**
 * 二叉树
 */
class TreeNode {
  constructor (value) {
    this.value = value
    this.left = null
    this.right = null
  }
}

class BST {
  constructor () {
    this.root = null
    this.size = 0
  }

  getSize () {
    return this.size
  }
  isEmpty () {
    return this.size === 0
  }
  addNode (v) {
    this.root = this._addChild(this.root, v)
  }
  _addChild (node, v) {
    if (!node) {
      this.size++
      return new Node(v)
    }
    if (node.value > v) {
      node.left = this._addChild(node.left, v)
    } else if (node.value < v) {
      node.right = this._addChild(node.right, v)
    }
    return node
  }
}
// 先序遍历
