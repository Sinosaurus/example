function test1(bool) {
    console.log('test1');
    return bool;
}
function test2(bool) {
    console.log('test1');
    return bool;
}
console.log('使用 &&');
if (test1(true) && test2(true)) {
    console.log(1);
}
else {
    console.log(2, '\n');
}
console.log('使用 ||');
if (test1(true) || test2(false)) {
    console.log(1);
}
else {
    console.log(2);
}
var str1 = "\n  \u901A\u8FC7\u4E0A\u8FF0\u5B9E\u9A8C\uFF0C\u76EE\u524D\u5728\u4F7F\u7528 && \u65F6\uFF0C\n  \u524D\u4E00\u4E2A\u901A\u8FC7\u624D\u4F1A\u6267\u884C\u4E0B\u4E00\u4E2A\u5224\u65AD\u6761\u4EF6\uFF0C\n  \u800C\u4E0D\u662F\u5168\u90E8\u90FD\u6267\u884C\n";
console.log(str1);
