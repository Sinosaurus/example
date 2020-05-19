<?php
//    header('content-type: text/html; charset= utf8');
    header("content-type: text/html; charset= utf8");

function dump($arr) {
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
//    多文件上传
//判断条件
//1 文件是否大于8m
//2 是否超过指定要求的m
//3 判断文件类型 mime
//4 错误判断 error
//5 准备迁移

//若是多文件上传，需要将每个文件所有信息提出重新组成一个新的数组
//多维数组时， 尽可能转为二维或者一维，便于更好地可读

//若多文件上传及单个文件上传时，具体内容如何  多文件上传与单文件上传都是三维数组
//dump($_FILES);
//首先降低数组维
$file = $_FILES['files'];
dump($file);
foreach ($file as $k => $v) {
//    dump($v); 一维数组
//    现在需要将每个$v 中的对应值取出来，重新组成一个单个文件的全部数据
//    $fileOne['name']  = $file['name'][$k];
//    dump($k);
    foreach ($v as $key => $value) {
        $fileOne[$k] = $value;
        dump($fileOne);
    }
//    dump($v[$k]);
//    dump($file['name'][$k]);
}