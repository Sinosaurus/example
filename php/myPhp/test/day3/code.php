<?php
header('content-type: text/html; charset= utf8');
//大集合数组
$arr1 = range('a', 'z');
$arr2 = range('A', 'Z');
$arr3 = range(1, 9);
//合并各分支数组
$big = array_merge($arr1, $arr2, $arr3);
//打乱数组
shuffle($big);
//随机拿到四个索引
$index = array_rand($big, 4);//这个是数组，值是$big 的下标
//遍历拿到对应的值
//拼接
$code = '';
foreach($index as $v) {//
    $code .=$big[$v];
}
var_dump($code);