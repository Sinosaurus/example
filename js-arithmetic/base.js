const arr = [1, 3, 2, 4, 7, 6, 5]
// 冒泡
// 将杂乱的数据进行排序
for (let i = 1; i < arr.length; i++) {
	for (let j = 0; j < arr.length - i; j++) {
		if (arr[j] > arr[j + 1]) {
			let temp = null
			temp = arr[j + 1]
			arr[j + 1] = arr[j]
			arr[j] = temp
		}
	}
}
console.log(arr)

// 二分法
// 有序数据，查找某个元素的索引
const findItem = 7

function findActiveIndex(arr, active) {
	let minIndex = 0
	let maxIndex = arr.length - 1
	// 取一半
	let half = parseInt((minIndex + maxIndex) / 2)
	while (minIndex <= maxIndex) {
		if (findItem > arr[half]) {
			minIndex = half + 1
			half = parseInt((minIndex + maxIndex) / 2)
		} else if (findItem < arr[half]) {
			maxIndex = half - 1
			half = parseInt((minIndex + maxIndex) / 2)
		} else {
			return half
		}
	}
	return -1
}
console.log(findActiveIndex(arr, findItem))
