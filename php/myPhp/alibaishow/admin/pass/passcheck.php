<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 15:10
 */
header('content-type:text/html; charset=utf8');
//include_once './../commin/session.php';
session_start();
$uCode = $_SESSION['key'];
$code =  $_POST['code'];
if ($uCode == $code) {
    echo 1;
} else {
    echo 0;
}

//通过用户名来判断密码
//["email"]=> string(4) "wo@s" ["password"]=> string(2) "dd" ["code"]=> string(4) "RCNG"
//var_dump($_POST);
$email = $_POST['email'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');



$sql = "select * from ali_user where user_email = '$email' ";
$res = mysql_query($sql);
$arr = mysql_fetch_assoc($res);
//var_dump($arr);
/*{ ["user_id"]=> string(2) "28" ["user_email"]=> string(6) "龙儿" ["user_slug"]=> string(16) "qiyueqi@sina.com" ["user_nickname"]=> string(9) "小龙女" ["user_password"]=> string(32) "0f5264038205edfb1ac05fbb0e8c5e94" ["user_pic"]=> string(0) "" ["user_status"]=> string(1) "1" }*/
if ($arr['user_password'] == $password) {
    echo '登陆成功';
    $_SESSION['userId'] = $arr['user_id'];
    $_SESSION['userSlug'] = $arr['user_slug'];
    header('refresh:1; url= ./../index.php');

} else {
    echo '用户密码错误';
    header('refresh:1; url=./../login.html');
}

