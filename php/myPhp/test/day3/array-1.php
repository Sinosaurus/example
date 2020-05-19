<?php
header('content-type: text/html; charset= utf8');
function dump($arr) {
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
};
$arr1 = [1, 2, 3, 5];
dump($arr1);

$arr2[] = 333;
$arr2[] = 555;
dump($arr2);
//array(2) {
//    [0]=>
//  int(333)
//  [1]=>
//  int(555)
//}

$phone['goods'] = 'mz';
$phone['prices'] = 2600;
$phone['num'] = 10;
dump($phone);
//array(3) {
//    ["goods"]=>
//  string(2) "mz"
//    ["prices"]=>
//  int(2600)
//  ["num"]=>
//  int(10)
//}

//索引数组  索引为 0, 1, 2.....不表示对应值得含义

$arr3 = [4=>55, 7=>77];//直接指定对应索引的值
dump($arr3);
//array(2) {
//    [4]=>
//  int(55)
//  [7]=>
//  int(77)
//}
$arr4 = [7=>777, 555, 666];//555， 666会在7的索引上自行添加
dump($arr4);
//array(3) {
//    [7]=>
//  int(777)
//  [8]=>
//  int(555)
//  [9]=>
//  int(666)
//}

//关联数组   下标可以表示对应值得意义
$student = [
    'name'=> '花无常',
    'age'=>18,
    'sex'=>'boy'
];
dump($student);
//array(3) {
//    ["name"]=>
//  string(9) "花无常"
//    ["age"]=>
//  int(18)
//  ["sex"]=>
//  string(3) "boy"
//}

//下标需要用引号来包含 按元素添加顺序进行排序

$info = [123, 'huahua', 2, 'name'=>'long'];//混合数据 name=>long 的下标直接为name 其他按数字进行排序
dump($info);
//array(4) {
//    [0]=>
//  int(123)
//  [1]=>
//  string(6) "huahua"
//    [2]=>
//  int(2)
//  ["name"]=>
//  string(4) "long"
//}
$array = array('aa', 122);//创建数组的第二种方式
dump($array);
//array(2) {
//    [0]=>
//  string(2) "aa"
//    [1]=>
//  int(122)
//}
