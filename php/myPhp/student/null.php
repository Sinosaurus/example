<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 19:16
 */
include_once './function.php';
session_start();
$_SESSION = [];
redirect(0, './login.php', '退出成功');