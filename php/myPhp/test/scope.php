<?php
header('content-type: text/html; charset= utf8');
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2017/12/27
 * Time: 21:04
 */
//作用域
//全局作用域
$a = 1;
$b = 2;
$c = 3;
echo "全局";
echo '<pre>';
var_dump($GLOBALS) ;
echo '</echo>';
//局部作用域
function A() {
//    $A = 11;
    $GLOBALS['A'] = 11;
};
function B() {
//    $B = 11;
    $GLOBALS['B'] = 11;

};
function C() {
//    $C = 11;
    $GLOBALS['C'] = 11;
    $_GET['$d'] = 12;

};
//需要调用才可以吗
A();
B();
C();


echo $_GET['$d'];
echo "局部"."<hr />";
echo '<pre>';
var_dump($GLOBALS) ;
echo '</echo>';