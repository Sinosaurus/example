<?php
include './../commin.php';

//建立连接
//默认库为 text
$conf['db'] = 'apple';
connect($conf);
//dump(connect($conf));
//是否是选择了apple库 下面代码可以插入进去，成功
/*
$nam = 'macs';
$seq = 200;
//$insert = "insert into apple_c values (null, 'mac', 150)";
$inse = "insert into apple_c values (null, '$nam', $seq)";
if (mysql_query($inse)) {
    echo '1';
} else {
    echo '0';
}*/

//显示表中具体数据
//失败情况 依旧有返回值 成功资源型 失败 false


//成功两种
//是否为空
//是否有行  判断是否为空
//返回值
//mysql_num_rows(返回值) == 0； // 0 行
$sele = "select * from apple_p";
$res = mysql_query($sele); // 数据类型  资源型
dump($res);
//dump(mysql_num_rows($res) == 0);
//die;
if (mysql_query($sele) or !(mysql_num_rows($res) == 0)) {
    echo '1';
} else {
    echo '0';
}

//非空结果集  可以是一大堆也可以是某一条

//解析结果集
//mysql_fetch_array(查询结果集)  返回索引加上关联数组
//mysql_fetch_assoc() 关联数组
//mysql_fetch_row() 索引数组

//每执行一次，指针自行向下移动一次。当指针非法（超出了）
//，返回false

$result = mysql_fetch_assoc($res);
dump($result);

$result1 = mysql_fetch_assoc($res);
dump($result1);
//dump($result);


//解析结果集 每次获取一行 循环解析

//只能通过指针非法，作为跳出循环条件
$arr = [];
while ($row =  mysql_fetch_assoc($res)){//需要有个数组将每次循环的结果收集起来
    $arr[] = $row;
};
dump($arr);

//遍历收集的结果，开始渲染到页面中

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <caption>商品信息</caption>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>pub_date</td>
        </tr>
        <?php foreach($arr as $k => $v) { ?>
            <tr>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['name']?></td>
                <td><?php echo $v['price']?></td>
                <td><?php echo $v['pub_date']?></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>

<!--模式-->
<?php foreach($array as $k => $v): ?>
<?php endforeach; ?>
<!--两者等同-->
<?php foreach($array1 as $k1 => $v1){ ?>
<?php } ?>
