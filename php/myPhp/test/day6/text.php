<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/3
 * Time: 10:00
 */
header("content-type: text/html; charset= utf8");
echo '<pre>';
var_dump($_GET);
echo '</pre>';
$sql = 1;
$page = $_GET['page'];
$pagesize = 3;
$offset = ($page-1)*$pagesize;
echo "select * from $sql limit $offset, $pagesize";
echo "<br>";
$a = $_GET['use'];
echo $a;

//$_SERVER

//-------------------------------------------------------------
//$_GET 关联数据   数据上限 2kb 数据量小
//  参数1=值&参数2=值2  查询字符串（query_string）
//用于页码 商品编号
//-------------------------------------------------------------------
//$_POST 安全性  method='POST' name属性必须写
//不通过地址栏提交，数据相对安全     默认上限8m 通过post_max_size 进行修改
//
//------------------------------
//post 只能获取post方式获取，而地址栏的只能get获取
//现在通过$_REQUEST 来将post和get的数据放在一起，因而可以通过这个便可以获取get和post的数据 //通过下标来找相应的值

