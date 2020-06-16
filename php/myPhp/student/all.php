<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 19:18
 */
//所有的页面都需要进行判断是否为空 ，没有当前页面 若有则跳转到登录页面
include_once './function.php';
session_start();
if (empty($_SESSION['pass']) ){
    redirect(0, './login.php','');
}