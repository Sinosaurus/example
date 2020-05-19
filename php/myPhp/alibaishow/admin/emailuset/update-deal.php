<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 17:05
 */




header('content-type: text/html; charset= utf8');


/*user_id
user_email
user_slug
user_nickname
user_password
user_pic
user_status*/
include_once './../commin/session.php';
$id = $_POST['id'];
$email = $_POST['email'];
$slug = $_POST['slug'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$status = $_POST['status'];



//echo $id;
$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "update ali_user set user_email = '$email', user_slug = '$slug', user_nickname = '$nickname', user_password = '$password', user_status = $status where user_id = $id";
$res = mysql_query($sql);
if ($res) {
    echo '成功';
    header('refresh: 1; ./usersshow.php');
} else {
    echo '<script>alert("失败"); history.back()</script>';
}