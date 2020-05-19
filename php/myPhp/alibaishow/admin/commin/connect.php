<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/12
 * Time: 16:57
 */
header("content-type: text/html;charset= utf8");
include_once './../commin/session.php';
function connect() {
    $GLOBALS['link'] = mysql_connect('localhost: 3306', 'root', 'root');
    mysql_query('set names utf8');
    mysql_query('use ali');
}
function dump($var) {
    if (is_array($var)) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    } else {
        var_dump($var);
    }
}