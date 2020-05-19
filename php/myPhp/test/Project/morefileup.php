<?php
header("content-type:text/html;charset=utf8");
function dump($var) {
    if (is_array($var)) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    } else {
        echo $var.'<br>';

    }
}

//dump($_FILES);

//1 先判断是否为空

//2 先拿到每个文件再具体判断

//目前是三维数组，需要降低维度，来使用
$files = $_FILES['file'];//二维数组
//遍历
//dump($files);
$newArr = [];
//$bigArr = [];
//目前从数组里取出来，形成新的数组
foreach ($files as $k => $v) {
   /* dump($k);
    dump($v);*/
//   dump($k);
    foreach($v as $key => $value) {
        $newArr[$key][$k] = $value;
//         $newArr[] = $v[$key];
//        dump($newArr);
//        $newArr['name'] = $v[$key];
//        $newArr['tmp_name'] =
        /*dump($key);
        dump($value);*/
//        $newArr[][$k] = $value;

    }
//    $bigArr[] = $newArr;
//    dump($newArr);
//    $newArr['name'] = $v[$k];

}

dump($newArr);