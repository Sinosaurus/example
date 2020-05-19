<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/6
 * Time: 8:56
 */
include_once './all.php';

include_once './function.php';
include_once './commin.php';
connect($conf);
//dump($_GET);

$stu_id = $_GET['stu_id'];

if (empty($stu_id)) {
    echo '111';
    redirect(1,'./ind.php', '未知错误');
}

$p_str = "select * from student where stu_id = $stu_id";
//dump($p_str);

$p_res = mysql_query($p_str);
if (!$p_str || mysql_num_rows($p_res) == 0) {
    die("<script>alert('查无此人'); history.back()</script>");

}

$arr = mysql_fetch_assoc($p_res);
//dump($arr);
//需要学生的stu_class找到班级中对应的班级及专业

//在班级表中查找班级及专业
$stu_class = $arr['stu_class'];
$c_str = "select * from class where class_id = $stu_class";
$u_res = mysql_query($c_str);
if (!$u_res || mysql_num_rows($u_res) == 0) {
    die("<script>alert('查询不到班级')</script>");
}
$u_arr = mysql_fetch_assoc($u_res);
//dump($u_arr);
$u_class = $u_arr['class_name'];
$specialty = $u_arr['specialty'];
$head_teacher = $u_arr['head_teacher'];


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin-left: 0;
        }
        table {
            margin: 20px auto;
            width: 60%;
            border: 1px solid skyblue;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            height: 50px;
            border: 1px solid blue;
        }
        #btn {
            width: 100px;
            height: 50px;
            position: fixed;
            right: 40px;
            top: 50px;
            background-color: red;
        }
    </style>
</head>
<body>

<!--array(7) {
["stu_id"]=>
string(1) "5"
["stu_name"]=>
string(6) "蕾姆"
["stu_age"]=>
string(2) "20"
["stu_sex"]=>
string(3) "女"
["stu_class"]=>
string(1) "1"
["stu_tel"]=>
string(11) "13476681777"
["stu_pic"]=>
string(0) ""
}-->
    <a href="./ind.php" id='btn'> 返回首页</a>
    <table>
        <caption><h2><?= $arr['stu_name']?>  信息</h2></caption>

<!--        姓名	班级	专业	性别	电话	图片	年龄-->

        <tr>
            <th>姓名</th>
            <td><?= $arr['stu_name']?></td>
        </tr>
        <tr>
            <th>班级</th>
            <td><?= $u_class?></td>
        </tr>
        <tr>
            <th>专业</th>
            <td><?= $specialty?></td>
        </tr>
        <tr>
            <th>电话</th>
            <td><?= $arr['stu_tel']?></td>
        </tr>
        <tr>
            <th>年龄</th>
            <td><?= $arr['stu_age']?></td>
        </tr>
        <tr>
            <th>性别</th>
            <td><?= $arr['stu_sex']?></td>
        </tr>
        <tr>
            <th>班主任</th>
            <td><?= $head_teacher?></td>
        </tr>
        <tr>
            <th>图片</th>
            <td><img src="<?= $arr['stu_pic']?>" alt=""></td>
        </tr>

    </table>
</body>
</html>
