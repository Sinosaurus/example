<?php
header('content-type: text/html; charset= utf8');
function dump($arr) {
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
//多维数组
$students = [
    ['long',19],
    ['fei', 20],
    ['hua', 11]
];
dump($students);
//array(3) {
//    [0]=>
//  array(2) {
//        [0]=>
//    string(4) "long"
//        [1]=>
//    int(19)
//  }
//  [1]=>
//  array(2) {
//        [0]=>
//    string(3) "fei"
//        [1]=>
//    int(20)
//  }
//  [2]=>
//  array(2) {
//        [0]=>
//    string(3) "hua"
//        [1]=>
//    int(11)
//  }
//}
//拿龙这个值
echo $students[0][0];

$arr2 = [1, 22, 77, 66, 23, 37];
//取出每一个值
for($i = 0; $i < 5; $i++) {
    echo $arr2[$i].'<br>';//循环要求，索引依次增加，不能跳跃，必须是索引数组
}

//foreach
foreach($arr2 as $key => $value) {//key 和 value 的值可以使任意类型 k v...重视顺序，位置 $key=> 可以不要
    echo $key.'=>'.$value.'<br>';
}
foreach($arr2 as $v) {
    echo $v.'<br>';
}

$arra = array('name'=>'Sinosaurus', 'age'=> 26, 'sex'=> 'boy');
foreach($arra as $k => $v) {
    echo $k.'=>'.$v.'<br>';
}
echo '<hr />';
$ary1 = array([1, 3, 2], [22, 55, 77],[633, 25, 12]);
foreach($ary1 as $k => $v) {
    dump($v);//只有这样才能打印出来 二维
//    echo $k.'='.$v.'<br>';
    foreach($v as $key=> $value) {
        dump($key.'=>'.$value); //而一维可以如此
    }
}


