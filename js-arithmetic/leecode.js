/**
 * @param {number[]} nums
 * @return {number}
 */
var findLengthOfLCIS = function (nums) {
  const arr = []
  let l = 0
  // 相邻的数据递增即可 比大小
  for (let i = 0; i < nums.length; i++) {
    const item0 = nums[i]
    const item1 = nums[i + 1]
    const item2 = nums[i+2]
    if (item0 < item1) {
      if (Array.isArray(arr[l])) {
        arr[l].push(item0)
      } else {
        arr[l] = []
        arr[l].push(item0)
      }
    } else if (item0 < item1 && item1 > item2) {
      arr[l].push(item1)
    } else {
      l++
    }
  };
  console.log(arr)
}
findLengthOfLCIS([1, 3, 5, 4, 7])