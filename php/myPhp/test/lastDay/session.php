<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 14:42
 */
//需要先开启session
session_start();

$_SESSION['a'] = 123;
$_SESSION['b'] = true;
$_SESSION['c'] = [1, 2, 3];
echo '<pre>';
var_dump($_SESSION);//需要开启才能调用
