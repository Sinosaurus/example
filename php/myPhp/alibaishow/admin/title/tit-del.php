<?php
/**
 * 处理文章添加
 */
include_once './../commin/session.php';
header('content-type: text/html;charset= utf8');

//["title"]"a"
//["editorValue"] 挥毫泼墨画乾坤，落笔生花百年传！
//["slug"] "a"
//["category"] "1"
//["created"] "2017-01-04T00:01"
//["status"]"草稿"

/*+-------------+-----------------------+------+-----+---------+----------------+
| Field       | Type                  | Null | Key | Default | Extra          |
+-------------+-----------------------+------+-----+---------+----------------+
|    | int(10) unsigned      | NO   | PRI | NULL    | auto_increment |
| | varchar(30)           | NO   | UNI | NULL    |                |
| | varchar(30)           | NO   | UNI | NULL    |                |
| tit_desc    | varchar(200)          | NO   |     | NULL    |                |
 | text                  | NO   |     | NULL    |                |
| int(11)               | NO   |     | NULL    |                |
 | int(11)               | NO   |     | NULL    |                |
|   | varchar(200)          | NO   |     | NULL    |                |
| | int(10) unsigned      | NO   |     | NULL    |                |
| tit_updtime | int(10) unsigned      | NO   |     | NULL    |                |
| tit_click   | int(10) unsigned      | NO   |     | NULL    |                |
| tit_good    | int(10) unsigned      | YES  |     | 10      |                |
| tit_bad     | int(10) unsigned      | YES  |     | 0       |                |
|  | enum('草稿','已发布')         | YES  |        | 草稿       |    |
+-------------+-----------------------+------+-----+---------+----------------+*/
/**
 * 由form表单传递的值
 */
$tit_title   = $_POST['title'];
$tit_content = $_POST['editorValue'];
$tit_slug    = $_POST['slug'];
$tit_cateid  = $_POST['category'];
$tit_updtime = strtotime($_POST['created']);
$tit_status  = $_POST['status'];
$tit_desc    = $_POST['simple'];
//文件

   /* ["feature"]=>
  array(5) {
        ["name"]"
        ["type"]"
        ["tmp_name"]"
        ["error"]
        ["size"]*/
if (empty($_FILES)) {
    echo '文件有问题';
    header('location: ./post-add.php');
    die;
} else {
    $file = $_FILES['feature'];
//    文件进行判断是否是mime类型
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $file['tmp_name']);
//    假设文件类型只能是
//    die($mimetype);
    $fileType = ['image/png', 'image/jpeg'];
    if ( !in_array($mimetype, $fileType)) {
        echo '非法格式文件';
        header('refresh: 3;url=./post-add.php');
        die;
    }
    if ( is_uploaded_file($file['tmp_name']) && $file['error'] == 0) {
        $str = strrchr($file['name'], '.');
        $newPath = '../uploads/'.date('YmdHis-').mt_rand(1000, 9999).$str;
        if (move_uploaded_file($file['tmp_name'], $newPath)) {
            echo '图片上传成功';
        } else {
            echo '失败';
        }
    }
}

//文件路径
$tit_file  = $newPath;
/**
 * 由session传的值
 */
$tit_author = $_SESSION['userId'];
/**
 * 剩余的几个
 */
//tit_addtime
//tit_click
//tit_good
//tit_bad
$tit_addtime = time();
$tit_click   = mt_rand(500, 1000);
$tit_good    = mt_rand(200, 460);
$tit_bad     = mt_rand(1, 40);


/*
$tit_title
$tit_content
$tit_slug
$tit_cateid
$tit_updtime
$tit_status
$tit_desc
$tit_file
$tit_author
$tit_addtime
$tit_click
$tit_good
$tit_bad*/
$sql = "insert into ali_title values (null, '$tit_title','$tit_slug', '$tit_desc', '$tit_content', $tit_author, $tit_cateid, '$tit_file', $tit_addtime, $tit_updtime, $tit_click,$tit_good,$tit_bad, $tit_status)";

/**
 * 开始连接数据库
 */
$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');

$res = mysql_query($sql);
$num = mysql_affected_rows($link);
if ($num > 0) {
    echo '成功';
    header('refresh:1; url=./posts.php');
    die;
} else {
    echo "<script>alert('文章失败');history.back()</script>";
}

//mysql_close($link);