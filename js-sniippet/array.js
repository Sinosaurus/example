// 快速生成数组

/**
 * 生成一个长度为10的数组
 */
const length = 10

Array.from({ length }, () => 0)
// 两者结果相同cd
Array(length).fill(0)