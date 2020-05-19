<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/6
 * Time: 14:15
 */
include_once './all.php';

include_once './function.php';
include_once './commin.php';
$stu_id = $_GET['stu_id'];
//连接数据库
connect($conf);
$d_str = "delete from student where stu_id = $stu_id";
$d_res = mysql_query($d_str);
//dump($d_str);
if ($d_res) {
    redirect(1, './ind.php', '删除成功');
} else {
    redirect(1, './ind.php', '删除失败');

}