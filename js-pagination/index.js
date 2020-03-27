/*
 * @LastEditors: Sinosaurus
 */
import {
  findElementUpward,
  findElementsUpward,
  findElementDownward,
  findElementsDownward,
  findBrothersComponents
} from './../lib/utils.js'
/**
 * 上一页 首页 ... 6 7 |8| 9 10 ... 尾页 下一页
 * 上一页，下一页 2
 * 首页，尾页 2
 * 省略号 2
 * @params count 从省略号到选中元素之间的个数
 * @params baseCount 基础数据 最大为11个
 * 相邻元素 2 * count (当前为 【6，7】，【9，10】)
 * 选中 1
 */
// 一般 11 个元素 意味着 baseCount 最大值为 11
// baseCount = 2 + 2 + 2 + 2 * count + 1
/**
 * 1. 判断何时出现省略号
 * 去除 上一页 下一页 2
 * baseCount > 11 - 2 时需要出现省略号 ==> total > baseCount - 2
 * 2. 省略号 最少代表 2个元素
 * 3. 出现的位置
 * 3.1 两侧  1 ... 4,5|6|7,8 ... 12
 * 3.2 头部 1 ... 4,5|6|7,8,9,10
 * 3.3 尾部 1,2,3,4|5|6,7 ... 12
 * 
 * 声明
 * @params {string|number} total 分页总数（去除上一页及下一页）
 * 出现省略号的前提 total > 11 - 2(上一页+下一页)
 * @params {string|number} current 当前选中的元素
 * @params {string|number} startPosition 左边出现省略号开始的位置
 * @params {string|number} endPosition 右边出现省略号开始的位置
 * 3.2
 * 首页（1） + 省略号（最小值 2）+ current左边的值 count(2) + 自身（1）
 * current = 1 + 2 + count + 1
 * 由于上面是最小值，因而可以判断 出现省略号的位置 必定大于等于上面的值， 标记当前为 startPosition
 * 因而可以断定
 * startPosition = 1 + 2 + count + 1
 * 出现省略号 current > startPosition
 * 3.3
 * 尾页（1）+ 省略号（最小值2）+ current右边的值 count（2）+ 自身（1）
 * endPosition = total - (1 + 2 + count + 1) 
 * 出现省略号 current < endPosition
 * 3.1 上面的集合
 * startPosition <= current && current <= endPosition
 */
// 分析其他位置情况 （先不考虑上一页及下一页【因为一直会存在，变数是中间的9个元素】）
/**
 * @params surplus {string|number} 剩下展示的数据
 * 4.1 省略号出现在前面
 * 1 ... 5 6 |7| 8 9 10 11 
 * 排除 1 ... 剩下的就是需要展示的数据surplus
 * 剩下展示的数据为
 * ** total - surplus **
 * 4.2 省略号出现在后面
 * 1 2 3 4 5 6 7 ... total
 * ** surplus **
 * 4.3 前后出现省略号
 * current + count * 2
 */
/**
 * @description: 生成分页数据
 * @param {number|string} total 总数
 * @param {number|string} current 当前页
 * @param {number|string} count 省略号到当前的数据 （默认为2）
 * @return: 
 */
function createPagination(total, current, count = 2) {
  let result = [];
  let baseCount = count * 2 + 1 + 2 + 2 + 2; //总共元素个数
  let surplus = baseCount - 4; //只出现一个省略号 剩余元素个数
  let startPosition = 1 + 2 + count + 1;//前面出现省略号的临界点
  let endPosition = total - 2 - count - 1;//后面出现省略号的临界点
  if (total <= baseCount - 2) { //全部显示 不出现省略号
    result = Array.from({ length: total }, (v, i) => i + 1);
  } else { //需要出现省略号
    if (current < startPosition) { //1.只有后面出现省略号
      result = [...Array.from({ length: surplus }, (v, i) => i + 1), "...", total]
    } else if (current > endPosition) { //2.只有前边出现省略号
      result = [1, '...', ...Array.from({ length: surplus }, (v, i) => total - surplus + i + 1)]
    } else { //3.两边都有省略号
      result = [1, '...', ...Array.from({ length: count * 2 + 1 }, (v, i) => current - count + i), '...', total]
    }
  }
  return result
}

function initPagination (total, current = 1) {
  const container = document.querySelector('.sc-pagination__container')
  const result = createPagination(total, current)
  let strArr = []
  result.forEach((item, index) => {
    const isEllipsis = item === '...'
    const arrow = index === 1 ? 'start' : 'end'
    /**
     * 使用时去掉 onclick 即可
     */
    const strHtmlHasEllipsis =  `
      <li class="sc-pagination__item ellipsis">
        <a onclick="return false" href="/js-pagination/index.html?pagesize=${ arrow === 'start' ?
        (current - 5 < 1 ? 1 : current - 5)
        : arrow === 'end' ? 
        (current + 5 > total ? total : current + 5 )
        : ''}">
          <button data-id="${index + 1}" ${item == current ? 'class="active"' : ''}>${item}</button>
        </a>
      </li>
    `
    const strHtml = `
      <li class="sc-pagination__item">
        <a href="/js-pagination/index.html?pagesize=${item}" onclick="return false">
          <button data-type="${item == 1 ? 'start' : item == total ? 'end' : ''}" data-id="${index + 1}" ${item == current ? 'class="active"' : ''}>${item}</button>
        </a>
      </li>
    `
    const html = isEllipsis ? strHtmlHasEllipsis : strHtml
    strArr.push(html) 
  })
  container.innerHTML = strArr.join('')
}

function handleButton (total) {
   /**
   * 此处需要事件代理
   */
  const paginationContainer = document.querySelector('.sc-pagination__container')
  paginationContainer.addEventListener('click', function (e) {
    const isTarget = e.target.nodeName.toLocaleLowerCase() === 'button'
    if (!isTarget) return
    const currentBtn = findElementDownward(this, 'active')
    const currentId = Number(currentBtn.innerText)
    const targetId = e.target.innerText
    if (targetId === '>' || targetId === '<' || targetId === '...') {
      const ellipsis = ellipsisArrow(e.target)
      const text = ellipsis === 'start' ?
        (currentId - 5 < 1 ? 1 : currentId - 5)
        : ellipsis === 'end' ? 
        (currentId + 5 > total ? total : currentId + 5 )
        : ''
      initPagination(100, text)
    } else {
      initPagination(100, targetId)
    }
  }, false)
}
/**
 * @description: 获取 ellipsis 的方向
 * @param {Element} el ellipsis元素 
 * @return: end | start | ‘’
 */ 
function ellipsisArrow (el) {
  const targetElement = findElementUpward(el, 'ellipsis')
  const previousElementSibling = targetElement.previousElementSibling
  const nextElementSibling = targetElement.nextElementSibling
  const previousBtn = previousElementSibling && previousElementSibling.querySelector('button') || ''
  const nextBtn = nextElementSibling && nextElementSibling.querySelector('button') || ''
  const before = previousBtn.dataset.type === 'start'
  const end = nextBtn.dataset.type === 'end'
  return before ? 'start' : end ? 'end' : ''
}

function ellipsisHandle () {
  // https://zh.javascript.info/mousemove-mouseover-mouseout-mouseenter-mouseleave#mouseovermouseoutrelatedtarget
  const paginationContainer = document.querySelector('.sc-pagination__container')
  paginationContainer.addEventListener('mouseover', function (e) {
    const el = findElementUpward(e.target, 'ellipsis')
    const isTarget = e.target.nodeName.toLocaleLowerCase() === 'button'
    if (!isTarget || !el) return
    const result = ellipsisArrow(e.target)
    if (result) {
      // start | end
      e.target.innerText = result === 'start' ? '<' : '>'
    }
  }, false)
  paginationContainer.addEventListener('mouseout', function (e) {
    const el = findElementUpward(e.target, 'ellipsis')
    const isTarget = e.target.nodeName.toLocaleLowerCase() === 'button'
    if (!isTarget || !el) return
    e.target.innerText = '...'
  }, false)
}

document.addEventListener('DOMContentLoaded', () => {
  const total = 100
  initPagination(total)
  handleButton(total)
  ellipsisHandle(total)
}, false)
