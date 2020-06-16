<?php
header('content-type: text/html; charset= utf8');
//string
//    单引号和双引号的区别
$aa = '花开时节';
$str1 = "双引号$aa";
$str2 = '单引号$aa';
//可以转义符
$str3 = "双引号,转义符\"$aa\"";
//只有最外层是双引号才能解析变量
echo $str1;
echo '<hr />';
echo $str2;
echo '<hr />';
echo $str3;

echo '<br />';//几乎不用
$str0 =<<<aaa
    '<script>alert(1111)</script>';
aaa;
//顶格写
