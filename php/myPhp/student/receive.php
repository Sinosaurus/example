<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 17:33
 */
include_once './function.php';
include_once './commin.php';
//dump($_POST);

//


//接收数据
if (empty($_POST)) { //不可能为空了。默认就已经有参数了
//    跳转回去
//    同时提示
    redirect(2, './add.php', '信息不能为空');
}
//判断姓名手机号是否为空 ==》 重视这两个信息  正则来判断（建议）stu_name stu_tel
if (empty($_POST['stu_tel']) || empty($_POST['stu_name'])) {
    redirect(2, './add.php', '信息不能为空');

}


//判断文件上传   上传 处理   没上传 空字符替代
//1 文件是否 > 8M
//2 文件是否超过指定的大小
//3 文件类型是否符合mime类型
//4 是否有错误 进行错误类型识别
//5 迁移文件 同时进行文件名修改
//获取文件
//dump($_FILES);

if (empty($_FILES)) {
    die('未上传文件'); //这个情况可以有几种出现   没填写tel和姓名 会在前面直接被拦截  二 填写了但是上传文件大于8m  导致数组变为空  依旧在前面被拦截
}
$stu_pic = $_FILES['stu_pic'];

//假设文件为1.5m
$max_img = .5;
if ($stu_pic['size'] > $max_img * 1024 * 1024) {
    die('上传的图片大于 1.5M');
}

//mime类型判断
$finfo    = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $stu_pic['tmp_name']);
//dump($mimetype);

//假设文件类型只能在是
$file_type = ['image/png', 'image/jpeg'];
if (!in_array($mimetype, $file_type)) {
    die('请注意文件格式');
}

//错误类型进行判断
if ($stu_pic['error'] != 0) {
    $e_info = '';
    switch ($stu_pic['error']) {
        case 1:
            $e_info = '1';
            break;
        case 4:
            $e_info = '4';
            break;
        case 6:
            $e_info = '6';
            break;
        default:
            $e_info = "其他错误";
            break;

    }
    die($e_info);
}

//开始准备上传到永久路径
//还要先判断是否是文件
    if (!is_uploaded_file($stu_pic['tmp_name'])) @ die(文件错误);//临时路径
//dump(is_uploaded_file($stu_pic['tmp_name']));

//开始移动到永久路径

//永久路径地址及文件名称
//获取文件名后缀，重新定义名称
$tex = strrchr($stu_pic['name'], '.');
$newPath = './upload/'.date('YmdHis-').mt_rand(1000, 9999).$tex;
//dump($newPath);

if (move_uploaded_file($stu_pic['tmp_name'],$newPath )) {
    echo $stu_pic['name'].'上传成功';
} else {
    echo '临时路径出错';
}


// history.go(-1) //跳转到前一页   js中
//构建sql语句 插入数据
//查询进行信息比对，若是相同则返回，若不是则下一步
//需要比对姓名和tel，其他不管
//dump($_POST);//一维数组
/*array(6) {
    ["stu_id"]=>
  string(0) ""
    ["stu_name"]=>
  string(4) "long"
    ["stu_age"]=>
  string(0) ""
    ["stu_sex"]=>
  string(3) "男"
    ["stu_class"]=>
  string(2) "1 "
    ["stu_tel"]=>
  string(11) "15549446666"
}*/
//获取数据
//查询数据
connect($conf);//连接
$query = "select stu_name, stu_tel from student";
//dump($query);
$b_arr = mysql_query($query);
//进行判断是否错误以及为空
if (!$b_arr || mysql_num_rows($b_arr) == 0) die('错误');



dump($b_arr);
//解析资源型
$bigArray = [];
while ($row = mysql_fetch_assoc($b_arr)) {
    $bigArray[] = $row;//二维数组
}
//dump($bigArray); //空
$newName = $_POST['stu_name'];
$newTel = $_POST['stu_tel'];
foreach($bigArray as $v) {
    if (in_array($newName, $v) || in_array($newTel, $v)) {
        die("<script>alert('信息有重复，请重新填写'); history.go(-1)</script>") ;
    }
}


//由于nametel分布在每一个一维数组中，，需要每一个进行遍历吗？

//dump($newName.'------'.$newTel);
/*if (in_array($newName, $bigArray) || in_array($newTel, $bigArray)) {
    echo "<script>alter('信息有重复，请重新填写') ;history(-1)</script>";
}
dump(in_array($newName, $bigArray));*/



//插入数据
//$add_data = 'insert into student values  '
//本想单个添加数据，但是想使用遍历数组，单个选择，好难，选择另一种
/*+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| stu_id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| stu_name  | varchar(8)  | NO   | UNI | NULL    |                |
| stu_age   | tinyint(4)  | NO   |     | 25      |                |
| stu_sex   | char(2)     | NO   |     | 人妖     |                |
| stu_class | varchar(15) | NO   |     | NULL    |                |
| stu_tel   | char(11)    | NO   |     | NULL    |                |
| stu_pic   | varchar(15) | YES  |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+*/
/*dump($_POST);
dump($_FILES);*/
$stu_name  = $_POST['stu_name'];
$stu_age   = $_POST['stu_age'];
$stu_sex   = $_POST['stu_sex'];
$stu_class = $_POST['stu_class'];
$stu_tel   = $_POST['stu_tel'];
$add_data = "insert into student values (null, '$stu_name', '$stu_age', '$stu_sex', '$stu_class' ,'$stu_tel','$newPath')";
//$a = mysql_query($add_data)
//die ($add_data);
if (mysql_query($add_data)) {
    redirect(2, './ind.php', '录入成功');
} else {
    die("<script>alert('信息有误'); history.go(-1)</script>") ;

}
//
//成功跳转到首页
//失败 返回前一页 数据不会丢失 这样不用重新输入