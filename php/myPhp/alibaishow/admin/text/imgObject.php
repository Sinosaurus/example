<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 9:59
 */
/**
 * 用对象方式封装验证码
 */
class Img1  {
    private $width = 300;
    private $height = 300;
    private function img() {
       return imagecreatetruecolor($this->width, $this->height);
    }
    private function randColor() {
        return imagecolorallocate($this->img(), mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }
    public function create() {

        imagefill($this->img(),0,0,imagecolorallocate($this->img(),255,255,255));
        $size = mt_rand(20, 26);
        $angle = mt_rand(-20, 20);
        $wi = imagefontwidth(12);
        $hi = imagefontheight(12);
//        $x =
//        $text = mb_substr('我',1, 10, 'utf8');
        imagettftext($this->img(),$size, $angle, $wi, $hi, $this->randColor(), 'STXINGKA.TTF', 'aaaaa');
        header('content-type:image/png');

        return imagepng($this->img());

    }
};
$a = new Img1();
$a->create();
