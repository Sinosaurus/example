const RENDER_TO_DOM = Symbol('render to dom')

function replaceContent(range, node) {
  range.insertNode(node)
  range.setStartAfter(node)
  range.deleteContents()

  range.setStartBefore(node)
  range.setEndAfter(node)
}
export class Component {
  constructor() {
    // 生成一个绝对空的对象
    this.props = Object.create(null)
    this.children = []
    this._root = null
    this._range = null
  }

  setAttribute(key, value) {
    this.props[key] = value
  }

  appendChild(component) {
    this.children.push(component)
  }

  get vdom() {
    return this.render().vdom
  }

  [RENDER_TO_DOM](range) {
    this._range = range
    this._vdom = this.vdom
    // 递归
    this._vdom[RENDER_TO_DOM](range)
  }

  update() {
    // diff
    const isSameNode = (oldNode, newNode) => {
      if (oldNode.type !== newNode.type) return false

      for (const key in newNode.props) {
        if (newNode.props[key] !== oldNode.props[key]) return false
      }

      if (Object.keys(oldNode.props).length > Object.keys(newNode.props).length) return false

      if (newNode.type === '#text') {
        if (newNode.content !== oldNode.content) return false
      }

      return true
    }

    const update = (oldNode, newNode) => {
      if (!isSameNode(oldNode, newNode)) {
        newNode[RENDER_TO_DOM](oldNode._range)
        return
      }

      newNode._range = oldNode._range

      let newChildren = newNode.vChildren
      let oldChildren = oldNode.vChildren

      if (!newChildren || !newChildren.length) return

      // 最后一个
      let tailRange = oldChildren[oldChildren.length - 1]._range

      for (let i = 0; i < newChildren.length; i++) {
        let newChild = newChildren[i]
        let oldChild = oldChildren[i]

        if (i < oldChildren.length) {
          update(oldChild, newChild)
        } else {
          let range = document.createRange()
          range.setStart(tailRange.endContainer, tailRange.endOffset)
          range.setEnd(tailRange.endContainer, tailRange.endOffset)
          newChild[RENDER_TO_DOM](range)

          tailRange = range
        }
      }
    }

    let vdom = this.vdom
    update(this._vdom, vdom)
    this._vdom = vdom
  }

  setState(newState) {
    const isObject = val => val !== null && typeof val === 'object'
    if (!isObject(this.state)) {
      this.state = newState
      // this.update()
      return
    }

    // deepClone
    const merge = (oldState, newState) => {
      for (let key in newState) {
        if (!isObject(oldState[key])) {
          oldState[key] = newState[key]
        } else {
          merge(oldState[key], newState[key])
        }
      }
    }

    merge(this.state, newState)
    this.update()
  }
}
class ElementWrapper extends Component {
  constructor(type) {
    super(type)
    // this.root = document.createElement(type)
    this.type = type
  }

  get vdom() {
    this.vChildren = this.children.map(child => child.vdom)
    return this
  }

  [RENDER_TO_DOM](range) {

    this._range = range

    const root = document.createElement(this.type)

    for (const key in this.props) {
      let value = this.props[key]
      const onRE = /^on([\s\S]+$)/
      if (key.match(onRE)) {
        root.addEventListener(RegExp.$1.replace(/^[\s\S]/, c => c.toLocaleLowerCase()), value)
      } else {
        if (key === 'className') {
          root.setAttribute('class', value)
        } else {
          root.setAttribute(key, value)
        }
      }
    }

    if (!this.vChildren) {
      this.vChildren = this.children.map(child => child.vdom)
    }

    for (let child of this.vChildren) {
      let childRange = document.createRange()
      childRange.setStart(root, root.childNodes.length)
      childRange.setEnd(root, root.childNodes.length)
      child[RENDER_TO_DOM](childRange)
    }

    replaceContent(range, root)
  }
}

class TextWrapper extends Component {
  constructor(content) {
    super(content)
    this.type = '#text'
    this.content = content
  }

  get vdom() {
    return this
  }

  [RENDER_TO_DOM](range) {
    this._range = range

    const root = document.createTextNode(this.content)
    replaceContent(range, root)
  }
}

export function createElement(type, attributes, ...children) {
  let e
  if (typeof type === 'string') e = new ElementWrapper(type)
  else e = new type // component

  for (let key in attributes) {
    e.setAttribute(key, attributes[key])
  }

  let insertChildren = children => {
    for (let child of children) {
      if (typeof child === 'string') {
        child = new TextWrapper(child)
      }
      if (child === null) {
        continue
      }
      if (Array.isArray(child)) insertChildren(child)
      else e.appendChild(child)
    }
  }

  insertChildren(children)
  return e
}

export function render(component, parentElement) {
  let range = document.createRange()
  range.setStart(parentElement, 0)
  // 空节点等
  range.setEnd(parentElement, parentElement.childNodes.length)
  range.deleteContents()
  component[RENDER_TO_DOM](range)
}