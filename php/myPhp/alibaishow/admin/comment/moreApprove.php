<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/18
 * Time: 18:54
 */
//var_dump($_POST['id']);
$id = $_POST['id'];
/**
 * 连接数据库
 */
$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "update ali_comment set cmt_state = '1' where cmt_id in $id";

$res = mysql_query($sql);
if($res) {
    echo 1;
} else {
    echo 0;
}