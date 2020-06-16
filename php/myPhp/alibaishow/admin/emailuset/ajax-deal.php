<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 18:30
 */
header('content-type: text/html; charset= utf8');
include_once './../commin/session.php';
$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
//print_r($_GET);
$id       = $_GET['id'];
$password = trim($_GET['pass']);
//查询数据库进行比对
$sql = "select user_password as pass from ali_user where user_id = $id";
$res = mysql_query($sql);
$arr = mysql_fetch_assoc($res);
$pass = $arr['pass'];

if (strlen($pass) > 20) {
    echo $pass == md5($password) ? 1 : 0;
} else {
    echo $pass == $password ? 1 : 0;
}