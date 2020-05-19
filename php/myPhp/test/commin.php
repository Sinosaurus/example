<?php
header("content-type: text/html; charset= utf8");
function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function connect ($conf) {
    $link = @mysql_connect($conf['host'], $conf['user'], $conf['pass']) or die('数据库忙');
//    设置字符集
    mysql_query('set names '.$conf['charset']);
//    选择库
    mysql_query('use '.$conf['db']) or die('没有当前库');
    return $link;
}
$conf = array (
    'host'    => 'localhost: 3306',
    'user'    => 'root'           ,
    'pass'    => 'root'           ,
    'charset' => 'ntf8'           ,
    'db'      => 'text'
);