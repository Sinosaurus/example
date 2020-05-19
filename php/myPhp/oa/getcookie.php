<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/7
 * Time: 11:47
 */
header('content-type:text/html; charset= utf8');
echo '<pre>';
var_dump($_COOKIE);
setcookie('book', '活着', PHP_INT_MAX, '/', '.text.com');