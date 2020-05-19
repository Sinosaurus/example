<?php
/**
 * Created by PhpStorm.
 * User: 李龙
 * Date: 2018/1/3
 * Time: 21:38
 */
header('content-type: text/html; charset= utf8');
echo '<pre>';
var_dump($_SERVER);
echo '</pre>';

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
    <caption>server的内容</caption>

    <tr>
        <th>服务端软件</th>
        <td><?php echo $_SERVER['SERVER_SOFTWARE']?></td>
    </tr>
    <tr>
        <th>域名</th>
        <td><?php echo $_SERVER['SCRIPT_NAME']?></td>
    </tr>
    <tr>
        <th>服务端ip</th>
        <td><?php echo $_SERVER['SERVER_PORT']?></td>
    </tr>
    <tr>
        <th>服务端端口</th>
        <td><?php echo $_SERVER['SERVER_ADDR']?></td>
    </tr>
    <tr>
        <th>客户端ip</th>
        <td><?php echo $_SERVER['REMOTE_ADDR']?></td>
    </tr>
    <tr>
        <th>网站根目录</th>
        <td><?php echo $_SERVER['DOCUMENT_ROOT']?></td>
    </tr>
    <tr>
        <th>查询时间</th>
        <td><?php echo $_SERVER['REQUEST_TIME']?></td>
    </tr>
</table>
</body>
</html>
