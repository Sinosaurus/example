<?php
/**
 * 生成随机验证码
 */
//include_once './../commin/session.php';
$img = imagecreatetruecolor(200, 46);
$str = str_shuffle(join('',array_merge(range('a','z'), range('A','Z'), range('1', 'z'))));

//
$str ='2345678bcdfghjmnpqrsuwyBCDEFGHJMNPQRWY';
$white = imagecolorallocate($img, 255, 255, 255);
imagefill($img, 0, 0, $white);
//$arr = [ 'STXINGKA.TTF', 'ALGER.TTF', 'BAUHS93.TTF', 'GIGI.TTF', 'HARLOWSI.TTF', 'LHANDW.TTF'];
$arr = ['Arvo-Regular.ttf'];
function color() {
    return imagecolorallocate($GLOBALS['img'], mt_rand(0, 255), mt_rand(0, 255),mt_rand(0, 200));
}
$res = '';
for ($i = 0; $i < 4; $i++) {
    $res .= $str[mt_rand(0, strlen($str)-1)];
}
for($i = 0; $i < 4; $i++) {
    imagettftext(
        $img,
        mt_rand(20, 24),
        mt_rand(-30, 30), // 字体向左倾斜

        10 + $i * 30,
        28,
        color(),
        $arr[mt_rand(0, count($arr)-1)],
        $res[$i] //这样无法获取其具体的值是多少，只能在外面获取到具体是那几个值，再拆分一个一个渲染到页面上
    );
    imageline($img, $i*20, $i*5, mt_rand(10,180), mt_rand(5, 42), color());
}
//die($res);
session_start();
$_SESSION['key'] = $res;
header('content-type: image/png');
imagepng($img);
imagedestroy($img);