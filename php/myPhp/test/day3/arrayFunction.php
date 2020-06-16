<?php
header('content-type: text/html; charset= utf8');
echo max(22, 77);
echo '<hr>';
//统计数组元素的个数
$arr = array(12, 5, 15, 123, 551);
echo count($arr).'<br>';
$arr1 = array([1, 5, 2], 55, 66);
$len = count($arr1);//3
$len1 = count($arr1, true);//递归统计 这个可以将多维数组的实际长度统计出来 3 + 3
echo $len.'<br>'.$len1.'<br>';
var_dump(in_array(55, $arr1));

//range()
$arr2 =range('a', 'z', 1);//1 表示是一个一个还是跳跃，若是1 可以不写
var_dump($arr2);
$arr3 = range('A', 'B', 1);
$arr4 = range(1, 9);
//array_merge 合并数据
$Arr = array_merge($arr2, $arr3, $arr4);
print_r($Arr);

echo '<br>';
//若是下标相同，会进行，后面讲前面进行覆盖


//array_rand
echo '<pre>';
$index = array_rand($Arr, 4);//拿到四个下标
print_r($index);

//shuffle 将原来的数组的顺序打乱，会修改原来的数组
shuffle($Arr);
$index = array_rand($Arr, 4);//拿到四个下标
//生成验证码的字符串
//按照下标找到value
//声明一个字符串，用来拼接
$code = '';
foreach($index as $v) {
//    $v 是下标
    $code .=$Arr[$v];
}
print_r($code);