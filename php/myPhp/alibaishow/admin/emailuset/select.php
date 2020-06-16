<?php


$page = $_GET['page'];

$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
/**
 * $pagesize = 5 假设每页显示五条
 */
$pagesize = 5;
$offset   = ($page - 1) * $pagesize;

$sql = "select count(*) as num from ali_user";
$res = mysql_query($sql);
//echo $num;

$arr = mysql_fetch_assoc($res);
$num = $arr['num'];
echo ceil($num/$pagesize);


//user_email  user_slug   user_nickname user_password user_status
$sql = "select user_email, user_slug, user_nickname, user_status from ali_user limit $offset, $pagesize ";
$res = mysql_query($sql);

$arr = [];
while($row = mysql_fetch_assoc($res)) {
    $arr[] = $row;
}
print_r(json_encode($arr));