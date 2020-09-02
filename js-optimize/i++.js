//https://blog.csdn.net/Dailoge/article/details/84874503
const arr = Array.from({length: 10}, (item, index) => index + 1)

// 测试 i++，++i

for (let i = 0; i < arr.length; i++) {
    console.log(i, arr[i], 'i++')
}
for (let i = 0; i < arr.length; ++i) {
    console.log(i, arr[i], '++i')
}