<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/9
 * Time: 19:23
 */
header('content-type: text/html; charset=utf8');
//连接数据库
function connect ($conf) {
    $link = mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die('数据库忙');
    mysql_query('set names '.$conf['charset']);
    mysql_query('use '.$conf['db']);
    return $link;
}
$conf = array(
  'host'   => 'localhost: 3306',
  'user'   => 'root',
  'pass'   => 'root',
  'charset'=> 'utf8',
   'db'    => 'user'

);
connect($conf);
$u_str = "select name from us";
//var_dump($u_str);

$re = mysql_query($u_str);
//var_dump($re);
if (!$re || mysql_num_rows($re) == 0) {
    die('查无数据');
}
//$result = mysql_fetch_assoc($re);
//var_dump($result);
$arr = [];
while ($row = mysql_fetch_row($re)) {
    $arr[] = $row;
}
/*echo '<pre>';
var_dump($arr);*/
//现在将所有的名字全部放在以一个一维数组中
$newArr = [];
foreach($arr as $v) {
    $newArr[] = $v[0];
}
/*echo '<pre>';
var_dump($newArr);*/



$user = $_GET['user'];
if (in_array($user, $newArr)) {
    echo 1;
} else {
    echo 0;
}