<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 16:38
 */
header("content-type: text/html; charset= utf8");

//打印 测试等函数
//边写边测试

//打印变量 或者数组
function dump($var) {
    if (is_array($var)) {
        echo '<pre>';
        var_dump($var);
        echo '</ore>';
    } else {
        var_dump($var);

    }
}
/*
$arr = array (1, 3, 7);
dump($arr);*/


//跳转
//header
function redirect($second=2, $url, $info) {
    header("refresh:$second; url= $url");
    die($info);
}