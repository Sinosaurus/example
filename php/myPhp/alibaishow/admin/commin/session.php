<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 18:30
 */
session_start();
if(empty($_SESSION['userId'])) {
    echo '非法登录';
    header('Location: /admin/login.html');
    die;
}
