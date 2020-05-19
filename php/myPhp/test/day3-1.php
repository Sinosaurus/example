<?php
    header('content-type: text/html; charset= utf8');
//    引入
//    include  include_once
//    require  require_once
include "./function.php";
$arr = [3, 5, 12, 0];
dump($arr);
//也可以引入html
//相对路径
//include('');
//绝对路径


//__DIR__  魔术常量
echo __DIR__;//此处会显示当前文件所在的目录


//include_once "./function.php"; //避免重复载入

//require "./index1.html"; //与include 有相当大的区别，若是没有引入对应的文件便会报错，后面的代码不会执行
//而include 只是警告，后面的代码还是会执行


require('./commin/day3-2.php');
include('/day.php');//这个 “/”是指网站根目录

