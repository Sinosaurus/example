<?php
    header('content-type: text/html; charset= utf8');
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2017/12/27
 * Time: 21:24
 */
echo 'Math函数'.'<br />';
echo '当前时间'.time().'<br />';
echo rand(10, 100).'<br />';
echo ceil('3.66');

echo '<hr />';
//时间日
echo date('Y-m-d H:i:s', time());