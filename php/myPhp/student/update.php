<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/6
 * Time: 10:44
 */
//修改好后提交成功 跳转到首页
include_once './function.php';
include_once './commin.php';
$stu_name = $_POST['stu_name'];
$stu_tel = $_POST['stu_tel'];
$stu_age = $_POST['stu_age'];
$stu_sex = $_POST['stu_sex'];
$stu_class = $_POST['stu_class'];
$stu_id = $_POST['stu_id'];

//先判断是否为空，同时姓名 tel 必须要有

if (empty($_POST) || empty($stu_name) || empty($stu_tel)) {
    die("<script>alert('姓名和电话不能为空'); history.back()</script>");

}
//连接数据库

connect($conf);

/*array(6) {
    ["stu_id"]=>
  string(2) "13"
    ["stu_name"]=>
  string(12) "花开世界"
    ["stu_age"]=>
  string(2) "38"
    ["stu_sex"]=>
  string(6) "人妖"
    ["stu_class"]=>
  string(1) "6"
    ["stu_tel"]=>
  string(11) "17787772444"
}*/

$u_str = "update student set stu_name = '$stu_name', stu_age = $stu_age, stu_sex = '$stu_sex', stu_class = $stu_class, stu_tel = '$stu_tel' where stu_id = $stu_id";
//dump($u_str);

$u_res = mysql_query($u_str);
//dump($u_res);
if ($u_res) {
    redirect(2, './ind.php', '修改成功');
} else {
    die("<script>alert('信息有误11111'); history.go(-1)</script>") ;

}
//dump($_POST);