<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/12
 * Time: 20:59
 */
include_once './../commin/session.php';
include_once './../commin/connect.php';
connect();
//dump($_POST);
$id     = $_POST['id'];
$name   = trim($_POST['name']);  /*trim()去除两端空白*/
$slug   = trim($_POST['slug']);
$icon   = trim($_POST['icon']);
$status = trim($_POST['status']);
$show   = trim($_POST['show']);
//update categories set cate_id = 7 where cate_id = 13;
//cate_id | cate_name | cate_slug | cate_class | cate_status | cate_show
$sql = "update categories set cate_name = '$name', cate_slug = '$slug', cate_class = '$icon', cate_status = $status, cate_show = $show where cate_id =  $id";
//dump($sql);
mysql_query($sql);

$num = mysql_affected_rows($GLOBALS['link']);

if ($num > 0) {
    echo '修改成功';
    header('refresh: 1; ./categories.php');
} else {
    echo '修改失败';
    die("<script>history.back()</script>");
}

