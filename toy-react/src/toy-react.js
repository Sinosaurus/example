const RENDER_TO_DOM = Symbol('render to dom')

class ElementWrapper {
  constructor(type) {
    this.root = document.createElement(type)
  }

  setAttribute(key, value) {
    const onRE = /^on([\s\S]+$)/
    if (key.match(onRE)) {
      this.root.addEventListener(RegExp.$1.replace(/^[\s\S]/, c => c.toLocaleLowerCase()), value)
    } else {
      if (key === 'className') {
        this.root.setAttribute('class', value)
      } else {
        this.root.setAttribute(key, value)
      }
    }
  }

  appendChild(component) {
    let range = document.createRange()
    range.setStart(this.root, this.root.childNodes.length)
    range.setEnd(this.root, this.root.childNodes.length)
    component[RENDER_TO_DOM](range)
  }

  [RENDER_TO_DOM](range) {
    range.deleteContents()
    range.insertNode(this.root)
  }
}

class TextWrapper {
  constructor(content) {
    this.root = document.createTextNode(content)
  }

  [RENDER_TO_DOM](range) {
    range.deleteContents()
    range.insertNode(this.root)
  }
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

  [RENDER_TO_DOM](range) {
    this._range = range
    // 递归
    this.render()[RENDER_TO_DOM](range)
  }

  rerender() {
    const oldRange = this._range
    // 处理range的bug
    const range = document.createRange()
    range.setStart(oldRange.startContainer, oldRange.startOffset)
    range.setEnd(oldRange.startContainer, oldRange.startOffset)
    this[RENDER_TO_DOM](range)
    
    oldRange.setStart(range.endContainer, range.endOffset)
    oldRange.deleteContents()
  }

  setState(newState) {
    const isObject = val => val !== null && typeof val === 'object'
    if (!isObject(this.state)) {
      this.state = newState
      this.rerender()
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
    this.rerender()
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