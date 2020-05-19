<?php
header('content-type:text/html; charset=utf8');
/**
 * 多文件上传处理逻辑
 */
//var_dump($_FILES);
/*array(1) {
    ["file"]=>
  array(5) {
        ["name"]=>
    array(3) {
            [0]=>
      string(12) "Evernote.ico"
            [1]=>
      string(12) "Ink_Note.ico"
            [2]=>
      string(15) "WebCam_Note.ico"
    }*/
//是一个多维数组

$file = $_FILES['file'];
//现在是二维数组  将每个文件的所有信息合在一起，然后将以此进行判断
$newArr = [];
foreach($file as $k => $v) {

    foreach($v as $key => $value) {
        $newArr[$key][$k] = $value;
    }
}
/*echo '<pre>';
var_dump($newArr);*/
//当个文件上传进行判断
//判断是否为空 基本不用 跳
//判断大小，数据类型

function judge($files, $url,$i) {
//    mime类型判断
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $fileResult = finfo_file($fileinfo, $files['tmp_name']);
//    假设是相册判断
    $type = strchr($fileResult, '/', true);
    if ($type == 'image') {
        echo '文件类型符合';
    }
    //文件上传达到各类要求
    if ($files['error'] == 0 && is_uploaded_file($files['tmp_name'])) {
//        给上传文件重新取名
        $str = strrchr($files['name'], '.');
        $newPath = $url.date('YmdHis-').mt_rand(100, 999).$str;
        if (move_uploaded_file($files['tmp_name'], $newPath)) {
            echo '上传成功';
        } else {
            echo $files[$i]['name'].'上传失败';
        }
    }
}
for ($i = 0; $i < count($newArr); $i++) {
    judge($newArr[$i], './../uploads/',$i);
}