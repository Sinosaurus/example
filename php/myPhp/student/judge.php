<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 18:16
 */
//用来接收 登录页面传过来数据 同时进行判断  利用用户名来找密码 因为用户名唯一
//因而提前建立一张表格
include_once './function.php';

//数据库连接
$conf = array(
  'host'    => 'localhost: 3306',
  'user'    => 'root',
  'pass'    => 'root',
  'charset' => 'gbk',
    'db'    => 'students'
);
$link = @mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die('服务器忙');
//设置字符集
mysql_query('set names '.$conf['charset']);
//选择库
mysql_query('use '.$conf['db']);
//dump($_POST);
$name = $_POST['user'];
$pass = $_POST['pass'];
//先判断是不是为空 这样方便 不用从数据库拿名字出来进行比对
if (empty($name) || empty($pass)) {
    die("<script>alert('姓名或密码不能为空'); history.back()</script>");
}

//通过name来找密码  姓名唯一
//拿密码全部拿出来进行比对
$l_str = "select password from admin where name = '$name'";
//die($l_str);
//die($l_str);
$l_res = mysql_query($l_str);
if (!$l_res || mysql_num_rows($l_res) == 0) {
    die("<script>alert('姓名或密码错误11'); history.back()</script>");
}
//因为只有一句数据
//dump(mysql_fetch_array($l_res));
$password = mysql_fetch_row($l_res)[0]; //拿到密码
//die($password);
//将提交过来的密码进行加密，再进行比较
$pa = md5($pass);
//die($pa);
if ($pa == $password) {

//    此处设置session
//    避免下次再进行登录
    session_start();
    $_SESSION['pass'] = $password;

    redirect(1, './ind.php', '登陆成功');

} else {
    die("<script>alert('姓名或密码错误22'); history.back()</script>");

}


mysql_close($link);