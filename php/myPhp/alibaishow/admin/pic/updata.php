<?php

include_once './../commin/session.php';

$id     = $_POST['id'];
$status = $_POST['status'];
$link   = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql    = "update ali_pic set pic_state = $status where pic_id = $id";
$res    = mysql_query($sql);
if (mysql_affected_rows($link)) {
    echo '1';
} else {
    echo '0';
}