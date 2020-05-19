<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 12:56
 */
include_once './../commin.php';
$conf['db'] = 'apple';
connect($conf);

//查看增删查改返回值的具体意义
//选择表 apple_c
/*+----+--------+------+
| id | name   | seq  |
+----+--------+------+
|  1 | ipad   |  100 |
|  2 | iphone |  103 |
|  3 | watch  |  104 |
|  4 | mac    |  150 |
|  5 | macs   |  200 |
+----+--------+------+*/
/*
 * //增加
//正确信息
$insert = "insert into apple_c values (null, 'meizu', 37)";
//错误信息
//表名错
$insert1 = "insert into apple_d values (null, 'xiaomi', 37)";

//内容错
$insert2 = "insert into apple_c values (null, 'xiaomi', 37, 121)";


//拿到返回值
$result = mysql_query($insert);
dump($result);//bool(true)

$result1 = mysql_query($insert1);
dump($result1);//bool(false)

$result2 = mysql_query($insert2);
dump($result2);//bool(false)
*/

//在插入数据中，只要错误，返回值就为false

//删除数据
/*
//正确信息
$dele = "delete from apple_c where id = 6";

//错误信息
//表名错
$dele1 = "delete from apple_d where id = 2";
//条件错误
$dele2 = "delete from apple_c where id = 10";

//返回值
$d_re = mysql_query($dele);
dump($d_re);//bool(true)

$d_re1 = mysql_query($dele1);
dump($d_re1);//bool(false)

$d_re2 = mysql_query($dele2);
dump($d_re2);//bool(true)*/

//在删除表格内容时，只有表名错，才会报错 条件错误或者删除成功都返回true
//正确信息
$upda = "update apple_c set name = 'iponeX' where id = 4";
//错误信息
//表名错误
$upda1 = "update apple_d set name = 'ipone10' where id = 5";
//条件错误
$upda2 = "update apple_c set name = 'ipone10' where id = 40";

//返回值
$u_up = mysql_query($upda);
dump($u_up);//bool(true)

$u_up1 = mysql_query($upda1);
dump($u_up1);//bool(false)

$u_up2 = mysql_query($upda2);
dump($u_up2);//bool(true)

// 表格错误才会报错  条件不论
