<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/4
 * Time: 17:09
 */
include_once './all.php';
include_once './commin.php';
include_once './function.php';
//dump('set names '.$conf['charset']);

/*获取 表格class的 班级编号  班级名称  学习专业  班主任姓名 开班时间
目前班级编号跟班级名称都是唯一*/
//class和student之间的联系可以用student的班级与class的id进行，数字间

//现在需要获取class中的信息
//开启连接
connect($conf);
//查询信息 class_id specialty（专业）
$str = "select class_id, specialty from class";
$sql = mysql_query($str);//取到就是资源型 不然就是false
//dump($sql); //获取到了
//进行判断
if (!$sql || mysql_num_rows($sql) == 0) {
    die ('数据获取失败').mysql_error();
}
//现在将$sql 进行解析，用一个新数组接收
//遍历
$c_arr = [];
while ($row = mysql_fetch_assoc($sql)) {
    $c_arr[] = $row;
}
//dump($c_arr);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息录取表</title>
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
    </style>
</head>
<body>
<!-- 学号 姓名 年龄 性别 班级  手机号 电子照片-->
<form action="./receive.php" method="post" enctype="multipart/form-data">
    <table>
        <caption><h3>学生信息录取表</h3></caption>
        <tr>
            <th>姓名</th>
            <td><input type="text" name="stu_name"></td>
        </tr>
        <tr>
            <th>年龄</th>
            <td><input type="text" name="stu_age"></td>
        </tr>
        <tr>
            <th>性别</th>
            <td>
                <input type="radio" name="stu_sex" value="男" checked>男
                <input type="radio" name="stu_sex" value="女">女
                <input type="radio" name="stu_sex" value="人妖">人妖
            </td>
        </tr>
        <tr>
            <th>班级</th>
            <td>
                <select name="stu_class" >
                    <?php foreach($c_arr as $v) { ?>
                    <option value="<?php echo $v['class_id']?> ">
                        <?php echo $v['specialty']?>
                    </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>手机号</th>
            <td><input type="tel" name="stu_tel"></td>
        </tr>
        <tr>
            <th>电子照片</th>
            <td>
                <input type="file" name="stu_pic" id='fil'>
                <img src="" alt="" width=100>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                  <input type="submit" value="提交">
            </td>
        </tr>
    </table>
</form>
<script>
    var fil = document.querySelector('#fil');

    fil.onchange = function() {
        var fi = fil.files;
        var reader = new FileReader();
        reader.readAsDataURL(fi[0]);
        reader.onload = function() {
            var img = document.querySelector('img');
            img.src = reader.result;
        }
    }
</script>
</body>
</html>
