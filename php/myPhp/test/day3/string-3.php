<?php
header('content-type: text/html; charset= utf8');
//查找字符串
$str = 'file.html.php';
echo strpos($str,'.'); //只找第一个
//strrpos() 从末位开始找
echo '<br>'.strrpos($str, '.');
//返回值为对应的索引

//substr()
$pos = strpos($str, '.');
echo substr($str, $pos);//有三个值
echo '<br>';
//strrchr 截取字符串
echo '<br>'.'开始'.'<br>';
 echo strrchr($str, '.');//从末位开始截

echo '<hr />';
//转义符 \n \r
echo '<pre>';
echo "\$str"."<br />";
echo "this\ni\rs";
echo '</pre>';