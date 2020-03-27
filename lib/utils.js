/**
 * @description: 向上查找最近的指定元素
 * @param {Object} el 当前元素
 * @param {String} className 需要找到 最近含className的元素
 * @return: 返回找到的元素 （否者返回null）
 */
export function findElementUpward (el, className) {
  let parent = el.parentNode
  let name = Array.from(parent.classList || [])
  while (parent && (!name.length || !name.includes(className))) {
    parent = parent.parentNode
    if (parent) name = Array.from(parent.classList || [])
  }
  return parent
}

/**
 * @description: 找到所有符合条件的元素
 * @param {Object} el 当前元素
 * @param {String} className 需要找到含className的元素
 * @return: 返回找到的所有元素
 */
export function findElementsUpward (el, className) {
  let parents = []
  const parent = el.parentNode
  if (parent) {
    if (Array.from(parent.classList || []).includes(className)) parents.push(parent)
    // 递归
    return parents.concat(findElementsUpward(parent, className))
  } else {
    return [];
  }
}

/**
 * @description: 向下查找最近的指定元素
 * @param {Object} el 当前元素
 * @param {String} className 需要找到 最近含className的元素
 * @return: 返回找到的元素 （否者返回null）
 */
export function findElementDownward (el, className) {
  const childrens = el.children
  let children = null
  if (childrens.length) {
    for (const child of childrens) {
      const name = Array.from(child.classList || [])
      if (name.includes(className)) {
        children = child;
        break
      } else {
        children = findElementDownward(child, className)
        if (children) break;
      }
    }
  }
  return children;
}

/**
 * @description: 向下找到所有符合条件的元素
 * @param {Object} el 当前元素
 * @param {String} className 需要找到含className的元素
 * @return: 返回找到的所有元素
 */
export function findElementsDownward (el, className) {
  return el.children.reduce((element, child) => {
    if (Array.from(element.classList || []).includes(className)) element.push(child);
    const foundChilds = findElementsDownward(child, className);
    return element.concat(foundChilds);
  }, []);
}

/**
 * @description: 找到兄弟元素
 * @param {ELement} el 当前元素
 * @param {String} className 需要找到含className的元素
 * @param {Boolean} exceptMe 是否排除自身 默认 true
 * @return: 找到的元素
 */
export function findBrothersComponents (el, className, exceptMe = true) {
  // 向上找到父元素，通过父元素拿到所有子元素
  let res = el.parentNode.children.filter(item => {
    return Array.from(item.classList || []).includes(className)
  });
  // 判断两个元素是否相同 https://developer.mozilla.org/zh-CN/docs/Web/API/Node/isEqualNode
  let index = res.findIndex(item => item.isEqualNode(el));
  if (exceptMe) res.splice(index, 1);
  return res;
}