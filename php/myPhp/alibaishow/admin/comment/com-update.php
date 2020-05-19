<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/18
 * Time: 16:30
 */
//echo $_GET['txt'];
$id = $_GET['id'];
$state = $_GET['txt'];
//echo $id;
$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql = "update ali_comment set cmt_state = '$state' where cmt_id = $id";

$res = mysql_query($sql);
if ($res) {
    echo '11';
} else {
    echo '00';
}