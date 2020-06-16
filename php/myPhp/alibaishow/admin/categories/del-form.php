<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/12
 * Time: 17:31
 */
include_once './../commin/session.php';
include_once './../commin/connect.php';

connect();
//dump($_GET);
$id = $_GET['id'];
$sql = "delete from categories where cate_id = $id";
mysql_query($sql);

//判断影响行
$num = mysql_affected_rows($GLOBALS['link']);
//die($link.'------'.$num);
if ($num >  0) {
    echo('删除成功') ;
    header('refresh:2; ./categories.php');
} else {
    echo('删除失败') ;
    header('refresh:2; ./categories.php');
}