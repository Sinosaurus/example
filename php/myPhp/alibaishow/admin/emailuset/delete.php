<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 15:26
 */
include_once './../commin/connect.php';
connect();
//dump($_GET);
include_once './../commin/session.php';
$id = $_GET['id'];/*
$sql = "select * from ali_user where user_id = $id";
$res = mysql_query($sql);
$arr = mysql_fetch_assoc($res);*/
//dump($arr);
/*array(7) {
    ["user_id"]=>
  string(2) "27"
    ["user_email"]=>
  string(3) "sdf"
    ["user_slug"]=>
  string(11) "31s5@qq.com"
    ["user_nickname"]=>
  string(1) "a"
    ["user_password"]=>
  string(32) "89e6d2b383471fc370d828e552c19e65"
    ["user_pic"]=>
  string(0) ""
    ["user_status"]=>
  string(1) "1"
}*/
$sql = "delete from ali_user where user_id = $id";
$res = mysql_query($sql);
echo $res? 1 : 0;