<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 20:59
 */

$arr1   = range('a', 'z');
$arr2   = range('A', 'Z');
$arr3   = range(1, 9);
$newArr = array_merge($arr1, $arr2, $arr3);
shuffle($newArr);
//随机获取四个下标
$arrKey = array_rand($newArr, 4);
$new = [];
foreach ($arrKey as $v) {
    $new[] = $newArr[$v];
}
//echo $new;

//画布大小
$img = imagecreatetruecolor(200, 200);
//填充画笔颜色
//imagefill($img, 200, 200, $red);
header('content-type: image/png');

//imagestring($img, 20, 10, 30, 'a', $green);
//////字体路径
//$tff = './STXINGKA.TTF';
$arr0 = [ 'STXINGKA.TTF', 'ALGER.TTF', 'BAUHS93.TTF', 'GIGI.TTF', 'HARLOWSI.TTF', 'LHANDW.TTF'];
foreach($new as $i => $v) {
    imagettftext(
        $img,
        rand(20, 25),
        rand(-20, 20),
        40 + $i * 30,
        100,
        imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255)),
        $arr0[rand(0, 5)],
        $v
    );
}



//绘制到页面中
imagepng($img);
imagedestroy($img);