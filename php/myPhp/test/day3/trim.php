<?php
header('content-type: text/html; charset= utf8');
$str = 'hua dao chang';
$str1 = trim($str, 'hua');
echo $str1.'<br>';
$str2 = '    　　　　　   huahuahuah        ';
echo $str2.'<br>';
echo trim($str2);