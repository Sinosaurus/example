<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/3
 * Time: 15:08
 */
header('content-type: text/html; charset=utf8');
echo "<pre>";
var_dump($_POST);
$pen = $_POST['pen'];

//var_dump($pen);
if (!empty($pen)) echo "有值";