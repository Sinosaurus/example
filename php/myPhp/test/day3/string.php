<?php
//header('content-type:text/html;charset=ntf8');
header('content-type: text/html; charset= utf8');

//addcslashes() 返回在指定字符前添加反斜杠的字符串
echo addcslashes('A001 A002 A003', 'A').'<br />';
//\A001 \A002 \A003
//addslashes() 返回在预定义的字符前添加反斜杠的字符串。

echo addslashes("A001 'A002 'A003").'<br>';//预定的字符有 '  "
//A001 \'A002 \'A003
$str1 = '我是忠"那你呢"';
echo addslashes($str1).'<br>';
//我是忠\"那你呢\"

//bin2hex()  	把 ASCII 字符的字符串转换为十六进制值。 二进制
echo bin2hex('花开').'没有测试出来'.'<br />';
//e88ab1e5bc80

//chop() 	删除字符串右侧的空白字符或其他字符。此函数是该函数的别名：rtrim()。  等同于rtrim（）；

//chr() 从指定的 ASCII 值返回字符。
$str2 = 'abcdefg';
echo $str2.chr(1).'<br />';//在str2 后面添加ASCII的值

//chunk_split() 	把字符串分割为一系列更小的部分。
echo chunk_split(base64_encode('this is dog')).'没有测试出来'.'<br />';//没有测试出来

//convert_uuencode() 	使用 uuencode 算法对字符串进行编码。
//convert_uudecode() 	解码 uuencode 编码字符串。
$str3 = '无令木石心，常笑人脆弱';
$str4 = convert_uuencode($str3);
$str5 = convert_uudecode($str4);
echo $str3.'<br>'.$str4.'<br>'.$str5.'<br/>';
//无令木石心，常笑人脆弱
//AYI>@Y+NDYIRHYY^SY;^#[[R,Y;BXYZR1Y+JZZ(2&Y;RQ `
//无令木石心，常笑人脆弱

//count_chars()返回有关字符串中所用字符的信息。需要使用循环才能罗列出来


//crypt() 单向的字符串加密法（hashing）。
$str6 = 'huakaishijieyufenfen';
echo crypt($str6).'<br>';
//$1$.x4.tt..$xrI54VBJ.ZT0qL1/Q.9z5/

//explode() 把字符串打散为数组。
echo '<pre>';
var_dump(explode('i','huakaishijie') );
echo '</pre>'.'<br>';

//implode() 	返回由数组元素组合成的字符串。 join 是其别名
$arr = [11, 22, 33, 15];
echo implode('', $arr).'<br>';
//11223315

//lcfirst() 	把字符串的首字符转换为小写。
//ucfirst() 	把字符串中的首字符转换为大写。

$st = 'my name is long';
$st1 = 'MY NAME IS LONG';
echo lcfirst($st1).'<br>';
echo ucfirst($st).'<br>';
//mY NAME IS LONG
//My name is long

//levenshtein() 	返回两个字符串之间的 Levenshtein 距离。
$st4 = 'wo shi ni de weiyi';
echo levenshtein($st4, 'weiyi').'<br>';
//13
echo levenshtein($st4, 'weiyi',10, 10, 10);//后三位数字可选。
//130

//localeconv() 	返回本地数字及货币格式信息。
//setlocale(LC_ALL,"US");
echo '<pre>';
var_dump(localeconv()) ;
echo '</pre>'.'<br>';
//array(18) {
//    ["decimal_point"]=>
//  string(1) "."
//    ["thousands_sep"]=>
//  string(0) ""
//    ["int_curr_symbol"]=>
//  string(0) ""
//    ["currency_symbol"]=>
//  string(0) ""
//    ["mon_decimal_point"]=>
//  string(0) ""
//    ["mon_thousands_sep"]=>
//  string(0) ""
//    ["positive_sign"]=>
//  string(0) ""
//    ["negative_sign"]=>
//  string(0) ""
//    ["int_frac_digits"]=>
//  int(127)
//  ["frac_digits"]=>
//  int(127)
//  ["p_cs_precedes"]=>
//  int(127)
//  ["p_sep_by_space"]=>
//  int(127)
//  ["n_cs_precedes"]=>
//  int(127)
//  ["n_sep_by_space"]=>
//  int(127)
//  ["p_sign_posn"]=>
//  int(127)
//  ["n_sign_posn"]=>
//  int(127)
//  ["grouping"]=>
//  array(0) {
//    }
//  ["mon_grouping"]=>
//  array(0) {
//    }
//}

//md5() 计算字符串的 MD5 散列
$st6 = 'long';
echo md5($st6).'<br>';
//0f5264038205edfb1ac05fbb0e8c5e94

//md5_file() 计算文件的 MD5 散列。
echo md5_file('string-3.php');
//5dceb08022239f0a46b546f1713fb862

//metaphone() 计算字符串的 metaphone 键。
