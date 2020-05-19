<?php
    header('content-type: text/html; charset= utf-8');
 //常量
//方法一
define('AA', '33');
var_dump(AA);
var_dump(defined('AA')) ;
echo '<br />', 'a'.'b','<br />';

//方法二
 const BB = 44;
 echo BB,'<br />';

// 运算符
//算术运算符 > 比较 > 逻辑 > 赋值
//（）可以提升优先级

$name = '龙';
$age = '26';
$str = '姓名'.$name.'年龄'.$age;
echo $str;

//抑制符 @ 用的比较少

//数据间相互转换
echo '<hr />';
$aa = 22;
echo $aa, '<br>';
$b = (int)$aa;
$c = (bool)$aa;
$d = (string)$aa;
echo $b,'<br>', $c,'<br>', $d;
echo '<pre>';
var_dump($b,$c,$d);
echo '</pre>';
echo '<hr>';
$text = (float)('112.6a');
$text1 = (float)'112.6aaa';
var_dump($text, $text1);
echo '<br />';


//短路运算
$study = 123;
if ($study > 100 || $b1 = 5) {
    echo $b1;// $b1 = 5 没有被执行
}
echo '<hr />';
if ($study > 100 && $b1 = 5) {
    echo $b1;
}
echo '<hr>';
$long = 55;
if ($long > 56) {
    echo 'a';
} elseif ($long <= 55) { //尽可能elseif连在一起书写
    echo 'c';
} else {
    echo 'd';
}
if ($long > 55) return '111';

//最大公约数
$num1 = 36;
$num2 = 12;
do {
    $mod = $num1 % $num2;//余数
    $num1 = $num2;//除数变为被除数
    $num2 = $mod;//余数作为除数
} while($mod != 0);
echo $num1;
echo '<hr />','<br />';
//$GLOBALS
echo '<pre>';
var_dump($GLOBALS);
echo '</pre>';
