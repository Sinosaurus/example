<?php
	echo "1222";
	//
	// 注释 跟js一样分两种
	// 可以插入html中，
	// 若是页面中只有php 
	// 那么结尾处可以省略掉
	// 此处 echo 类似document.write 直接打印在页面中
	// 
	// 使用时，需在服务器中打开
	// 因为php是运行在服务器上
	// 因而通过浏览器是打不开的
	// 
	// 
	// 
	// 
	// php 运作流程
	// 首先若是后缀为php
	// 那么php开始在该页面寻找php的内容，有就解析，没有直接将整个代码以字符串形式传给客户端，客户端 便开始解析也就是说 页面中的代码在服务端，而不是在客户端
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>text</title>
</head>
<body>
	<p>study</p>
</body>
</html>	