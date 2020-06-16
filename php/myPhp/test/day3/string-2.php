<?php
header('content-type: text/html; charset= utf8');
/*//字符串长度
$str = 'hello world';
echo strlen($str);//11 即是字符又是字节 而汉字为字节
echo '<br />'.strlen('我是中国人').'<br />';
echo mb_strlen('木石心','utf8');//需要开启mb_strlen 的扩展
//strlen 是字节 ， mb_strlen 是字符

echo '<hr />';
//字符串输出
//printf()
//%s 字符串
//%d 十进制
$name = '龙';
$age = 16;
printf('%s年龄为%d',$name,$age);

//str_replace(); 字符串替换  返回值为被替换的字符串
$str = 'hua真是';
echo str_replace('hua','long',$str);

//str_repeat() 字符串重复
$str1 = 'text aa';
echo str_repeat('aa', 10);

//大小写转换
//strtolower() 小写
//strotoupper()大写
$str2 = 'ABC';
echo '<br>'.strtolower($str2);
echo '<br />'.strtoupper($str2);

//ucfirst() 首字母大写
$str3 = 'this is long';
echo '<br>'.ucfirst($str3);
echo '<hr />';*/
//去除空白
//trim() 两段空白字符  ltrim左侧 rtrim右侧
$str4 ='　　　　000';
echo $str4.'<br>';
//var_dump(trim($str4, ' ')) ; //不明显
$str111 = "                    
  \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n
  
  Hello World!\t\t\t";
echo trim($str4);
var_dump(trim($str4));

echo '<br>';
echo $str111.'<br>';

var_dump(trim($str111, 'H!'));
$AA = trim($str111, 'H!');
var_dump($AA);
echo '<hr />';
//分割字符串
$path = '/hua||shui||lei||dian';
$arr = explode('||', $path);
echo '<pre>';
var_dump($arr);
echo '</pre>';
echo '<br />';
//echo $path;
//拼接字符串
//implode（）
echo implode('@@@',$arr);
//echo explode('@@@',)
//str_split() 指定剪多长
echo '<pre>';
var_dump( str_split($path, 3)); // 字节分割
echo '</pre>';
$str5 = '我是国人';
echo '<pre>';
var_dump(str_split($str5, 3));
echo '</pre>';

/*
$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";*/
$hello  = "Hello World";
/*var_dump($text, $binary, $hello);
echo '<pre>';

print "\n";

$trimmed = trim($text);
var_dump($trimmed);

$trimmed = trim($text, " \t.");
var_dump($trimmed);*/

$trimmed = trim($hello, "Hd");
var_dump($trimmed);

// 清除 $binary 首位的 ASCII 控制字符
// （包括 0-31）
/*$clean = trim($binary, "\x00..\x1F");
var_dump($clean);*/

?>