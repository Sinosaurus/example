<?php
header('content-type: text/html; charset= utf8');
$arr = array('num'=>'your');
echo  "hello {$arr['num']} ni!";
echo '<br>';
//array_push array_pop
//array_shift array_unshift
$arr1 = array(11,55, 77, 23, 15);
//$arr2 = array_push($arr1, 2);
$arr1[] = 2;
echo '<pre>';
var_dump($arr1);
$arr3 = array_pop($arr1);
var_dump($arr3);
var_dump($arr1);
echo '</pre>'.'<br>';

$ar1 = array('name'=>'long', 'hua'=>'shu');