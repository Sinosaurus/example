/*
 * 两个数组，一个数组是另一个数组的子集
 * 该数组需要依据子集的顺序动态改变集合对应的位置
 */

const log = console.log

const baseArr = [
2, 5, 4, 9, 8
]

// 集合
let gather = [
  'start',
  ...baseArr,
  'end'
]
 
// 子集
let subset = [
  ...baseArr
]

// 需要依据subset的位置来更改gather的对应位置
log(`
  集合： ${gather}
  子集：${subset}
`)

subset.sort()
log(`子集：${subset}`)

/**
 * 1. 需要找到子集在集合中的开始位置
 * 2. 子集每个元素的位置
 * 3. 类似冒泡排序来更换集合位置
 */

let findFirstIndex = gather.indexOf(subset[0])

function change() {
  for (let i = 0; i < subset.length; i++) {
    const subItem = subset[i]
    for (let j = i; j < gather.length; j++) {
      if (subItem === gather[j]) {
        const temp = gather[findFirstIndex]
        gather[findFirstIndex] = gather[j]
        gather[j] = temp
        findFirstIndex++
       }
    }
  }
}
change()

log(`
  集合： ${gather}
  子集：${subset}
`)