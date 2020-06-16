<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/6
 * Time: 20:34
 */
header('content-type: text/html; charset=utf8');
//setcookie('a', 11);
setcookie('b', 22);
//setcookie('c', 33);
setcookie('花', '臧', PHP_INT_MAX, '/');
setcookie('a', '');
setcookie('c', 77);
setcookie('name', '孽海花', time()+3600, '/', '.text.com');
setcookie('c', 77, time()-1);