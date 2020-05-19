<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 10:08
 */
include_once './../commin/connect.php';
include_once './../commin/session.php';
connect();
/*dump($_POST);
array(5) {
    ["email"]=>
  string(8) "1@qq.com"
    ["slug"]=>
  string(1) "1"
    ["nickname"]=>
  string(1) "1"
    ["password"]=>
  string(1) "1"
    ["status"]=>
  string(2) "on"
}*/
$email    = trim($_POST['email']);
$slug     = trim($_POST['slug']);
$nickname = trim($_POST['nickname']);
$password = md5(trim($_POST['password']));
$status   = trim($_POST['status']);
//$pic      = $_FILES['pic'];
//dump($_POST);die;
/*| user_id | user_email        | user_slug        | user_nickname | user_password                    | user_pic   | user_status*/
$sql = "insert into ali_user values (null, '$email', '$slug', '$nickname', '$password', '',  $status)";
$res = mysql_query($sql);
//die($res);
if ($res) {
    echo  '成功';
    header('refresh: 1; ./usersshow.php');
} else {
    die('<script>alert(\'失败\'); history.back()</script>');
}