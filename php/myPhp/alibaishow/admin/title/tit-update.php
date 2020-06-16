<?php
include_once './../commin/session.php';
header('content-type: text/html; charset= utf8');
/**
 * 由于input限制  时间无法限制在页面中
 */
//var_dump($_POST);


$link = mysql_connect('localhost:3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');

$tit_id      = $_POST['tit_id'];
$tit_title   = $_POST['title'];
$tit_content = $_POST['editorValue'];
$tit_desc    = $_POST['simple'];
$tit_slug    = $_POST['slug'];
$tit_updtime = strtotime($_POST['created']);//转为时间戳
$tit_addtime = time();
$tit_status  = $_POST['status'];
/**
 * 文件上传判断
 */

if(empty($_FILES)) {
    echo '文件错误';
} else {
    /**
     * 开始文件判断
     * 1 mime类型
     * 2 错误以及 是否符合上传文件要求
     * 3 修改名称
     * 4 移到永久路径
     */
        $file     = $_FILES['feature'];
        if ($file['error'] == 0 && is_uploaded_file($file['tmp_name'])) {

            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $filRe    = finfo_file($fileinfo, $file['tmp_name']);
//    开始判断文件类型
            $type     = strchr($filRe, '/', true);
            if ($type == 'image') {
                echo '是mime文件类型';
            }

            $str = strrchr($file['name'], '.');
            $newPath = '../uploads/'.date('YmdHis-').mt_rand(1000, 9999).$str;
            if (move_uploaded_file($file['tmp_name'], $newPath)) {
                echo '移动文件成功';
            } else {
                echo '移动失败';
            }
        }

}
$oldPath     = $_SESSION['oldPath'] ?$_SESSION['oldPath']: '' ;
//判断是否真的上传图片
if ($_FILES['feature']['error'] == 0) {
    $tit_file = $newPath;
}else {
    $tit_file = '';
}


if ($tit_file) {
    //删除原始文件

    if (unlink($oldPath)) {
        echo ('删除老文件成功');
    } else {
        echo '删除老文件失败';
    }

    $tit_file = ", tit_file = '$tit_file'";
}



$sql = "update ali_title set tit_title = '$tit_title', tit_slug = '$tit_slug', tit_content = '$tit_content', tit_updtime = '$tit_updtime', tit_desc = '$tit_desc' $tit_file ,tit_addtime = $tit_addtime, tit_status = $tit_status where tit_id = $tit_id";


$res = mysql_query($sql);
if ($res) {
    echo "文章修改成功";
    header('refresh:1; url=posts.php');
} else {
    echo "文章修改失败";
    header('refresh:1; url=tit-update.php');

}
