var num = 5;
var pre = '1';
// for (let i = 1; i < num; i ++) {
//   pre += pre.replace(/(\d)\1*/g, item => {
//     return String(item.length) + String(item[0])
//   })
// }
// 学习了，这个递归就是把重复数字分成一个组，\1就是重复正则第一个圆括号里面的内容，比如kk = "111221"，结果就是 kk.match(/(\d)\1*/g)  ["111", "22", "1"]
var str = '11115555555588888';
var arr = str.match(/(\d)\1*/g);
var _loop_1 = function (i) {
    console.log(pre, '====1===', i);
    var j = 1;
    pre = pre.replace(/(\d)\1*/g, function (item) {
        console.log(item, j);
        j++;
        return "" + item.length + item[0];
    });
    console.log(pre, '====2===', i);
};
for (var i = 1; i < num; i++) {
    _loop_1(i);
}
console.log(pre);
