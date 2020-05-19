<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 16:38
 */
//连接数据库的各个函数
function connect ($conf) {
    $link = mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die('服务器忙');
//    设置字符集
    mysql_query('set names '.$conf['charset']);
//    选择库
    mysql_query('use '.$conf['db']);
    return $link;
}

$conf = array (
    'host'    => 'localhost: 3306',
    'user'    => 'root',
    'pass'    => 'root',
    'charset' => 'utf8',//php & mysql 都是用utf8字符集  因而不能设置为gbk只是在mysql中查看时，另行设置即可
    'db'      => 'students'
);/*
$a = connect($conf);
var_dump($a);*/