<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/3
 * Time: 15:50
 */
header("content-type: text/html; charset= utf8");
/*echo '<pre>';
var_dump($_FILES);
die;*/
/*
echo '<pre>';
var_dump($_FILES);
var_dump($_FILES['img']['size']);
echo '</pre>';
die();*/

//首先分几步
//1 若是超过post设置的最大值，则 $_FILES 数组为空，若是上传空的则有值 error为4
//var_dump(empty($_FILES)) ;
if (empty($_FILES)) {
    die('上传文件过大');
}
//此处进行文件大小以及类型进行判断

//由于是file类型，最大为2m
//假设不能超过1.5m

$maxSize = 1.5;
//var_dump($_FILES) ;
if ($_FILES['img']['size'] > $maxSize * 1024 * 1024) {
    die('文件大于1.5m');
}

//-------------------------------
//判断文件类型是否符合,限定以及避免伪造的
//需要使用mime
$fileInfo = finfo_open(FILEINFO_MIME_TYPE);/*
var_dump($fileInfo);
die;*/
//读取上传的文件类型
$fileResult = finfo_file($fileInfo, $_FILES['img']['tmp_name']);
/*var_dump($fileResult);//"image/jpeg"
die;*/
//规定上传那些文件
$fileArray = ['image/jpeg', 'image/png'];
//遍历 $fileResult 是否在 $fileArray 中
if ( !in_array($fileResult, $fileArray)) {
    die('你的文件类型不正确');
}



//给文件重新命名
//避免重名 及其他问题

//可以通过上传的时间点和随机数合拼形成对应的名称
//因而用到字符串拼接，形成他的新名称

//拿到文件的后缀

//var_dump($_FILES['img']['name']);
$upAfter = strrchr($_FILES['img']['name'], '.');

//开始拼接
$_FILES['img']['name'] = date('YmdHis-').mt_rand(1000, 9999).$upAfter;//这样不好，因为还没上传到永久路径就被修改，最好是在move时再进行修改
//echo $_FILES['img']['name'];







//2 是否报错
$file = $_FILES['img'];
//var_dump($file);
if ($file['error'] != 0) {
    $out = '';
    switch ($file['error']){
        case 1:
            $out = "文件超过2M";
            break;
        case 4:
            $out = "未上传文件";
            break;
        case 6:
            $out = "找不到临时文件";
            break;
        default:
            $out = "位置错误";
            break;
    }
    die($out) ;
}

//3: 判断文件是否合法 判断路径
if (!is_uploaded_file($file['tmp_name'])) {
    die("非法文件") ;
}

//4: 将文件上传
//指定路径
$newPath = './upload/'.$file['name'];
if (move_uploaded_file($file['tmp_name'], $newPath)) {
    echo '<img src='.$newPath.' width="300px">';
    die($file['name'].'上传成功');
} else {
    die ('移动文件失败');
}

//move_uploaded_file($file['tmp_name'], $newPath);