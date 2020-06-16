<?php
header('content-type: text/html; charset= utf8');
//key的参数
$arr = array(
    'phone'=>'魅族pro8',
    'goods_name'=>'梦想',
    'price'=>'2700'
);
$keys = array_keys($arr);
$values = array_values($arr);
echo '<pre>';
var_dump($keys);
var_dump($values);

//排序
//sort
$aa = array(1, 22, 55, 9=>77, 12, 12, 5);
sort($aa);//原数组被修改 ，同时索引被修改
print_r($aa);

//asort() 有小到大排序，但是索引不会被改变

//rsort() 从大到小 索引被改变

//arsort 从大到小 保持索引

//ksort()  按照下标首字母排序 关联数组   小到大
//krsort 大到小
//ksort($arr);

print_r($arr);
