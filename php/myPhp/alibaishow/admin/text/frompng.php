<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 10:37
 */
/*$img = imagecreatefromjpeg('./pic-04.jpg');
header('content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);*/

/*header("content-type:image/png");

//
$img = imagecreatetruecolor(600, 600);

$blue = imagecolorallocate($img, 30, 60, 180);
$red  = imagecolorallocate($img, 220, 20, 20);
imagefill($img,150,150,$blue);

imagettftext($img, 20, 0, 200, 200, $red, 'msyhbd.ttc', '我');

imagepng($img);

imagedestroy($img);*/



header("content-type:image/png");

//
$img = imagecreatetruecolor(800, 800);
$str = '2345678abcdefhjklmnopqrstyvwxyz';
$len = strlen($str);
$code = "";

for($i=0;$i<4;$i++){
    $code .= $str[rand(0,$len-1)];
};


$blue = imagecolorallocate($img, 30, 60, 180);
$red  = imagecolorallocate($img, 220, 20, 20);
imagefill($img,150,150,$blue);

// imagestring($img, 7, 100, 100, "ghafasd", $red);

for($i=0;$i<4;$i++){
    imagettftext($img,rand(20,30),rand(-30,30),50+$i*50, 400,imagecolorallocate($img, rand(0,220), rand(0,220), rand(0,220)),"STXINGKA.TTF",$code[$i]);
}

imagepng($img);

imagedestroy($img);

?>



 ?>