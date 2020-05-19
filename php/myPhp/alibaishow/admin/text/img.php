<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/14
 * Time: 12:55
 */
$img    = imagecreatetruecolor(200, 200);
$bgcolo = imagecolorallocate($img, 0, 0, 0);
//字体颜色
$textcolor = imagecolorallocate($img, 255, 255, 255);

imagestring($img, 30, 20, 20, 'abc', $textcolor);

header("content-type: image/jpeg");
imagejpeg($img);
imagedestroy($img);