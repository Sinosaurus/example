<?php

header('content-type:text/html; charset=utf8');

include_once './../commin/session.php';
/**
 * 修改管理员信息 跳转至文章列表
 */
/**
 * 其实利用传过来的邮箱更为准确 唯一性
 */

/*array(4) {
    ["email"]=>
  string(9) "qq@qq.com"
    ["slug"]=>
  string(4) "long"
    ["nickname"]=>
  string(4) "long"
    ["text"]=>
  string(15) "MAKE IT BETTER!"
}*/
/*array(1) {
    ["file"]=>
  array(5) {
        ["name"]=>
    string(19) "FastStoneEditor.png"
        ["type"]=>
    string(9) "image/png"
        ["tmp_name"]=>
    string(44) "C:\Users\쟀질\AppData\Local\Temp\php79EF.tmp"
        ["error"]=>
    int(0)
    ["size"]=>
    int(137340)
  }
}*/
//首先判断文件是否符合条件
if (empty($_FILES)) {
    die('文件出错');
}
$file = $_FILES['file'];
//mime类型
$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
$finfo = finfo_file($fileinfo, $file['tmp_name']);
//die($finfo);
//假设上传类型只能是 image类型
//只需要管结果的前面是image类型即可
$info = strchr($finfo, '/',true);
//die($info);

if ($info == 'image') {
    echo '符合要求';
}
//开始判断文件是否符合要求 是否出错
if ($file['error'] == 0 && is_uploaded_file($file['tmp_name'])) {
    $str = strrchr($file['name'], '.');
    $newPath = './../uploads/'.date('YmdHis-').mt_rand(1000, 9999).$str;
    if (move_uploaded_file($file['tmp_name'], $newPath)) {
        echo '图片上传成功';
    } else {
        echo '失败';
    }
}

/*array(4) {
    ["email"]=>
  string(9) "qq@qq.com"
    ["slug"]=>
  string(4) "long"
    ["nickname"]=>
  string(4) "long"
    ["text"]=>
  string(15) "MAKE IT BETTER!"
}*/
$email    = $_POST['email'];
$slug     = $_POST['slug'];
$nickname = $_POST['nickname'];
$text     = $_POST['text'];

$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "update ali_user set user_slug = '$slug', user_nickname = '$nickname', user_txt = '$text', user_pic = '$newPath' where user_email = '$email' ";
$res = mysql_query($sql);
if (mysql_affected_rows($link)) {
    echo '修改成功';
    header('refresh: 1;url=../emailuset/usersshow.php');
} else {
    echo '修改失败';
    header('refresh:1;url=./profile.php');
}
