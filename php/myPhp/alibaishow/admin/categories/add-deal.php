<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/12
 * Time: 16:50
 */
include_once './../commin/connect.php';
include_once './../commin/session.php';


/*echo '<pre>';
var_dump($_POST);*/
/*+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| cate_id     | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| cate_name   | varchar(10)      | NO   | UNI | NULL    |                |
| cate_slug   | varchar(10)      | NO   | UNI | NULL    |                |
| cate_class  | varchar(10)      | NO   | UNI | NULL    |                |
| cate_status | tinyint(4)       | YES  |     | 1       |                |
| cate_show   | tinyint(4)       | YES  |     | 1       |                |
+-------------+------------------+------+-----+---------+----------------+*/
/*array(5) {
    ["name"]=>
  string(0) ""
    ["slug"]=>
  string(0) ""
    ["icon"]=>
  string(0) ""
    ["status"]=>
  string(1) "1"
    ["show"]=>
  string(1) "1"
}*/
$name   = trim($_POST['name']);  /*trim()去除两端空白*/
$slug   = trim($_POST['slug']);
$icon   = trim($_POST['icon']);
$status = trim($_POST['status']);
$show   = trim($_POST['show']);
connect();
$sql = "insert into categories values(null, '$name', '$slug', '$icon', $status, $show)";
//echo $sql;
//方法一
$res = mysql_query($sql);

//echo $res? '成功': '失败';
//-----------------------------------------------|------
$sql = "select * from categories";
$res = mysql_query($sql);
$arr = [];
while ($row = mysql_fetch_assoc($res)) {
    $arr[] = $row;
}

print_r(json_encode($arr));

//------------------------------------------------|---







/*if ($res) {
    echo '成功';
    header("refresh:1; url= ./categories.php");
} else {
    die("<script>alert('失败'); history.back()</script>");
}*/


