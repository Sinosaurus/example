<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 8:34
 */


/**
 * 随机生成数组
 *用 空字符串进行拼接
 * 通过str_shuffle对其进行打乱
 */
$str = str_shuffle(join('', array_merge(range('a', 'z'), range('A', 'Z'), range('1', '9'))));
//字体
$arr = [ 'STXINGKA.TTF', 'ALGER.TTF', 'BAUHS93.TTF', 'GIGI.TTF', 'HARLOWSI.TTF', 'LHANDW.TTF'];

$img = imagecreatetruecolor(200, 200);

//imagefill()

imagefilter($img, 0, 0, 199, 199);  /*0 199*/
//die($str[10]);
for($i = 0; $i < 4; $i++) {
    $randColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagettftext($img, 30, mt_rand(-20, 20), 30 + $i * 20, 50, $randColor, $arr[mt_rand(0, count($arr) - 1)],$str[mt_rand(0, strlen($str)-1)] );
}
/**
 * 干扰元素
 */
for($i = 0; $i < 3; $i++) {
    $randColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imageline($img, 10 + $i * 20, 20, 50 + $i * 50, 100 + $i * 20, $randColor);
}
for($i = 0; $i < 200; $i++) {
    $randColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagesetpixel($img, mt_rand(20, 200),mt_rand(20, 200), $randColor);
}
for($i = 0; $i < 3; $i++) {
    $randColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagearc($img, mt_rand(10, 180), mt_rand(10, 180), $i *20 + 10, $i * 20 + 10, 200, 100, $randColor);
}
for($i = 0; $i < 50; $i++) {
    $randColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    imagettftext($img, 20, mt_rand(10, 150),mt_rand(10, 150),mt_rand(10, 150),$randColor, 'BAUHS93.TTF', '*' );
}

header('content-type: image/png');
imagepng($img);
imagedestroy($img);
