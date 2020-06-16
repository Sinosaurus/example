<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 18:11
 */
//如果已经登录，直接跳转到首页
// echo md5(123456);
//进行判断是否已经登录，若是没有则留在该页面 若是登录则回到首页  直接判断cookie有没有设置，
//其他页面则判断有没有登录，没登录回到登录页面，其他则留在当前页面
//需要封装一个函数  来进行判断cookie的问题 那样每次只需调用即可
include_once './function.php';
session_start();
//dump($_SESSION);
if (!empty($_SESSION)) {
    redirect(0, './ind.php', '');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="./judge.php" method="post">
    用户名:<input type="text" name="user" id="">
    <br>
    密&nbsp;码:<input type="password" name="pass" id="">
    <br>
    <input type="submit" value="登录">
</form>
</body>
</html>
