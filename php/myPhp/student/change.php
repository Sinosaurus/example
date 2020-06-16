<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/6
 * Time: 8:52
 */
/*传递学号
一 直接在地址栏 url中
二 隐藏域中传递   input:hidden     name="" value ="获取其id名"*/


//通过修改信息中提交的学号，查到对应的人，进行展示出来 详细信息展示出来   同时可以进行修改
//
//提交到一个新页面进行修改  update
include_once './all.php';

include_once './function.php';
include_once './commin.php';

//dump($_GET);
//通过获取id将所有信息获取到， 进行解析放到页面中
connect($conf);
$stu_id = $_GET['stu_id'];
$str = "select * from student where stu_id = $stu_id";

//dump($str);
$result = mysql_query($str);
if (!$result || mysql_num_rows($result) == 0 ){
//    die('无此消息');//最好跳转到前一页
    die("<script>alert('无此消息'); history.back()</script>");

}
//dump($arr);

//解析拿到各个结果
$arr = mysql_fetch_assoc($result);


//dump($arr);



//查询班级信息、 进行展示出来
$c_str = 'select * from class';
$c_res = mysql_query($c_str);
//dump($c_res);
if (!$c_res || mysql_num_rows($result) == 0) {
    die('无班级消息');
}
$classInfo = [];
while ($row = mysql_fetch_assoc($c_res)) {
    $classInfo[] = $row;
}
//dump($classInfo);




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
<!--array(7) {
["stu_id"]=>
string(1) "4"
["stu_name"]=>
string(9) "木冰眉"
["stu_age"]=>
string(2) "20"
["stu_sex"]=>
string(3) "女"
["stu_class"]=>
string(5) "12期"
["stu_tel"]=>
string(11) "13476681777"
["stu_pic"]=>
string(0) ""
}-->
<form action="./update.php" method="post">
<!--    隐藏域 依旧需要需要将两者之间进行连接起来 -->
<!--    貌似可以不需要学号 可以用其他 但是不好比较 万一信息全部修改完就无法比较 而学号确实固定的不会显示在页面中  无法被修改-->
    <input type="hidden" name="stu_id" value="<?php echo $arr['stu_id']?>">
    <table>
        <caption><h3>修改</h3></caption>
        <tr>
            <th>姓名</th>
            <td><input type="text" name="stu_name" value="<?=$arr['stu_name']?>"></td>
        </tr>
        <tr>
            <th>年龄</th>
            <td><input type="text" name="stu_age" value="<?=$arr['stu_age']?>"></td>
        </tr>
        <tr>
            <th>性别</th>
            <td>
                <input type="radio" name="stu_sex" value="男"  <?php echo  $arr['stu_sex']=='男'?'checked':'' ?> >男
                <input type="radio" name="stu_sex" value="女"  <?php echo  $arr['stu_sex']=='女'?'checked':'' ?> >女
                <input type="radio" name="stu_sex" value="人妖" <?php echo  $arr['stu_sex']=='人妖'?'checked':'' ?> >人妖
            </td>
        </tr>
        <tr>
            <th>班级</th>
            <td>
                <select name="stu_class" >
                    <?php foreach($classInfo as $v) { ?>
                        <option value="<?php echo $v['class_id']?>" <?php echo $arr['stu_class'] == $v['class_id']? 'selected' : ''?> >
                            <?php echo $v['specialty']?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>手机号</th>
            <td><input type="tel" name="stu_tel" value="<?=$arr['stu_tel']?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="提交">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
