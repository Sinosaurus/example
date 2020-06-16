<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 8:16
 */
$arr = range('a', 'z');
shuffle($arr);
$a = array_rand(array_flip($arr), 4); //键值交换 可以不用获取key再去取value 直接获取就可以
$b = array_rand($arr, 4);
echo '<hr>';
echo '<pre>';
var_dump($b);
echo '<br>';
echo '<hr>';
echo '<pre>';
var_dump($a);