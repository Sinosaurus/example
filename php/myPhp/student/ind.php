<?php
include_once './commin.php';
include_once './function.php';


connect($conf);
//获取数据
$a_query = "select stu_id, stu_name, stu_class from student";
//die($a_query);

$a_data = mysql_query($a_query);

//进行判断是否错误以及为空
if (!$a_data || mysql_num_rows($a_data) == 0) die('错误11111');

$a_arr = [];
while ($row = mysql_fetch_assoc($a_data)) {
    $a_arr[] = $row;
}
//dump($a_arr);

//开启
session_start();


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
            /*height: 50px;*/
            border: 1px solid blue;
        }
        #btn {
            position: fixed;
            top : 20px;
            right: 20px;
            width: 80px;
            height: 40px;
            background-color: blue;
        }
    </style>
</head>
<body>
<!--    展示数据-->
<!-- 学号 姓名 年龄 性别 班级  手机号 电子照片-->
<a href="./add.php" id="btn">添加</a>

    <table>
        <tr>
            <td colspan=4>
                <?php if(!empty($_SESSION)):?>
                <a href="./null.php">退出</a> <!--退出需要将session设置为空-->
                <?php else : ?>
                <a href="./login.php">登录</a>
                <?php endif;?>

            </td>
        </tr>
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>班级</td>
            <td>操作</td>
        </tr>
       <!-- +-----------+--------------+------+-----+---------+----------------+
        | Field     | Type         | Null | Key | Default | Extra          |
        +-----------+--------------+------+-----+---------+----------------+
        | stu_id    | int(11)      | NO   | PRI | NULL    | auto_increment |
        | stu_name  | varchar(8)   | NO   | UNI | NULL    |                |
        | stu_age   | tinyint(4)   | NO   |     | 25      |                |
        | stu_sex   | char(2)      | NO   |     | 人妖        |                |
        | stu_class | varchar(15)  | NO   |     | NULL    |                |
        | stu_tel   | char(11)     | NO   |     | NULL    |                |
        | stu_pic   | varchar(300) | YES  |     | NULL    |                |
        +-----------+--------------+------+-----+---------+----------------+-->
        <?php foreach($a_arr as $v) {?>
        <tr>
            <td><?php echo $v['stu_id']?></td>
            <td>
                <a href="./particular.php?stu_id=<?= $v['stu_id']?>">  <!--显示详细信息-->
                    <?php echo $v['stu_name']?>
                </a>
            </td>
            <td><?php echo $v['stu_class']?></td>
            <td>
                <a href="./change.php?stu_id=<?php echo $v['stu_id']?>">修改</a>
                ||
                <a href="./delete.php?stu_id=<?php echo $v['stu_id']?>"  id='del'>删除</a>
            </td>
        </tr>
        <?php }?>
    </table>
<script>
    var del = document.querySelector('#del');
    del.onclick = function () {
        alert(1111);
    }

</script>
</body>
</html>
