<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/3
 * Time: 10:57
 */
echo '<pre>';
var_dump($_SERVER);
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
        table {
            text-align: center;
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        caption {
            font-size: 30px;
        }
        th, td {
            border: 1px solid #ccc;

        }
    </style>
</head>
<body>
<table>
    <caption>详细信息</caption>
    <tr>
        <th>服务端软件信息</th>
        <td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
    </tr>
    <tr>
        <th>服务器域名</th>
        <td><?php echo $_SERVER['SERVER_NAME'] ?></td>
    </tr>
    <tr>
        <th>服务器ip</th>
        <td><?php echo $_SERVER['SERVER_ADDR'] ?></td>
    </tr>
    <tr>
        <th>客户端ip</th>
        <td><?php echo $_SERVER['REMOTE_ADDR'] ?></td>
    </tr>
    <tr>
        <th>网站根目录</th>
        <td><?php echo $_SERVER['DOCUMENT_ROOT'] ?></td>
    </tr>
</table>
</body>
</html>
