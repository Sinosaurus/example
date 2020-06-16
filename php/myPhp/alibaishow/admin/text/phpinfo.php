<?php
/*imagecreatetruecolor(width,height);
imagecolorallocate($img, red,green,blue);
imagefill($img,x,y,color); /*x<width, y< height;*/
//imagepng, imagejpeg, imagegif($img,path) 有保存路径则不显示图片 没有则显示图片不保存
//销毁
imagedestroy($img);

创建画布（大小）imagecreatetruecolor --->  创建画笔（三基色 以及黑白。。。。）$red = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0).......
----> 填充画笔颜色（）imagefill($img, x, y , $red)
-----> 绘图  imagestring($img, 文字大小， 坐标X， 坐标Y,绘制的文本， color)
----->  imagefilledarc($img, 圆心坐标x,圆心坐标Y,圆的宽， 圆的高， 起始角度， 结束角度，圆的颜色， 圆的样式)
    imagepng($img) 参数2 路径

销毁画布  imagedestroy($img);

创建验证码  绘制验证码
