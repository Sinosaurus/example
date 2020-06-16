<?php
///*
///**
// * Created by PhpStorm.
// * User: 李龙
// * Date: 2018/1/3
// * Time: 18:32
// */
////用get方式接受数据
//header('content-type: text/html; charset= utf8');
////echo "中文";
//function dump($var) {
//    echo "<pre>";
//    var_dump($var);
//    echo "</pre>";
//}
//dump ($_GET);
//
////显示第几张
////假设每页显示5条
///*$pagesize = 5;
//$page = $_GET['page'];
//$offset = ($page - 1)*$pagesize;
//echo 'select * from sql limit'.$offset.','.$pagesize;*/
//
////js方式
////echo $_GET['hua'];
//
////php
////echo $_GET['php1'];
//*/?><!--<!---->
<!---->
<!---->--><?php
///*//header('location: ./form.html');
////header('refresh: 5; url = ./form.html');
//*/?>

<?php
    header('content-type: text/html; charset= utf8');
    echo '<pre>';
    var_dump($_POST);

