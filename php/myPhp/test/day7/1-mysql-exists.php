	<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 9:22
 */
//header('content-type:text/html;charset=gbk');
include_once './../commin.php';

//function_exists() 判断函数是否存在 boolean值
//dump(function_exists('mysql_connect'));

//数据库连接
$host = 'localhost: 3306'; //主机名和端口号连写
$user = 'root';
$password = 'root';
/*$link = @mysql_connect($host, $user, $password); //@避免报错  资源型  错误就返回false
dump($link);*/

/*//设置字符集
//mysql_set_charset()
mysql_query();
//选择某个库
mysql_query();

//or die
//错误信息
mysql_error();
//关闭连接
mysql_close($link);*/
/*$link = mysql_connect($host, $user, $password) or die ('服务器忙');
//设置字符集
$set = 'ntf8';
mysql_query('use names '.$set);
//选择库
$db = 'textaaa';
//mysql_query('use '.$db) or die ('库名未找到');

//判断错误

if (!mysql_query("use $db")) {
    die(mysql_error()) ;
}
echo ('成功');
//断开连接
mysql_close($link);*/

//封装
//$conf = []
$conf['host']    = 'localhost: 3306';
$conf['user']    = 'root';
$conf['pass']    = 'root';
$conf['charset'] = 'ntf8';
$conf['db']      = 'text';
//dump($conf);
function connect ($conf) {
    $link = @mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die('数据库忙');
//    dump($link);
//    设置字符集
    mysql_query('set names '.$conf['charset']);
//    选择库
    mysql_query('use '.$conf['db']) or die('没有当前库');

    return $link;

}
//$a = connect($conf);
//dump($a) ;

connect($conf);

//增删改查
// 有返回值
//增
//$bool = mysql_query("insert into tex values (null, 2, 'long', 200, '2017-12-4' )");
/*echo "insert into text values (null, 2, 'long', 200, '2017-18-4' )";
die();*/
// if ($bool) {
//     echo 'true';
// } else {
//     echo 'false1111111';
// }
// 删
/*$str = "delete from tex where id = 5";
 if (mysql_query($str)) {
     echo '1';
 } else {
     echo '0';
 }*/

// 改
//update text set name = 'huohuo' where id = 4;
$change = "update tex set name = 'huohuo' where id = 6";// id 必须改变 因为之前将数据删除，但是已经占用了id 而之后的id只能按照更改后的进行增加
 if (mysql_query($change)) {
     echo '1';
 } else {
     echo '0';
 }
 //--------------------------------
//增 删 改 目前都有返回值 Boolean值
//注意其修改后字符串要符合mysql要求，而不只是php中要求，因而字符串相当要注意，巨坑之地


 //------------------------------
