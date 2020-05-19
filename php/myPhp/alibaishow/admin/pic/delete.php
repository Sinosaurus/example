<?php

/**
 * 用来删除slides的图片
 */
$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$pic_id = $_POST['pic_id'];
//通过id找到对应的图片地址 将其删除

$sql = "select pic_path as num from ali_pic where pic_id = $pic_id";
$ras = mysql_query($sql);
$arr = mysql_fetch_assoc($ras);
$res = $arr['num'];
unlink($res);

//最好还是使用 flag  不要删除

$sql = "delete from ali_pic where pic_id = $pic_id";
$res = mysql_query($sql);
if (mysql_affected_rows($link)) {
    echo '1';
} else {
    echo '0';
}