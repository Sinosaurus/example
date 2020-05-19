<?php
//检验密码时，可以通过将查询出来的密码放入session中，这样就不用取数据库中调用数据来进行比对
//首先判断是否有session
header("content-type:text/html; charset=utf8");
include_once '../commin/session.php';
//获取数据

   /* ["oldpass"]
    ["newpassone"]
    ["newpasstwo"]*/
//   方式一
//开启数据库

$oldpass = $_POST['oldpass'];
$newpassone = $_POST['newpassone'];
$newpasstwo = $_POST['newpasstwo'];



//从携带的session中获取对应的id值
$id = $_SESSION['userId'];



$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "select user_password from ali_user where user_id = $id";
$res = mysql_query($sql);
$fpass = mysql_fetch_assoc($res);
$result = $fpass['user_password'];
//die($result);
//判断老密码
if (strlen($result) > 20) {
    if (md5($oldpass) != $result) {
        echo '密码错误';
        header("refresh:1; url=./../login.html");
    } else {
        if ($newpassone != $newpasstwo) {
            echo '新密码两次输入不同';
            header('refresh:1; url=./profile.php');

        } else {
            $newpass = md5($newpassone);
            $sql1 = "update ali_user set user_password = '$newpass' where user_id = $id";
//            die($sql1)
            $res  = mysql_query($sql1);
            if(!$res) {
                echo '修改失败';
                header('refresh:1; url=./profile.php');

            } else {
                echo '修改成功';
                header('refresh:1; url=./profile.php');
            }

        }
    }
} else {
    if ($oldpass != $result) {
        echo '密码错误';
        header("refresh:1; url=./../login.html");
    } else {
        if ($newpassone != $newpasstwo) {
            echo '新密码两次输入不同';
            header('refresh:1; url=./profile.php');

        } else {
            $newpass = md5($newpassone);
            $sql1 = "update ali_user set user_password = '$newpass' where user_id = $id";
            die($sql1);
            $res  = mysql_query($sql1);
            if(!$res) {
                echo '修改失败';
                header('refresh:1; url=./profile.php');

            } else {
                echo '修改成功';
                header('refresh:1; url=./profile.php');
            }

        }
    }
}

//方法二，只是密码不用从数据库提取，直接在设置session中将密码存在其中，再进行判断即可
