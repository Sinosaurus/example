<?php 
// $username = $_GET['aa'];


// if($username == 'wheee') {
// 	echo "username exists";
// } else {
// 	echo "username ok";
// }


$username = $_POST['aa'];


if($username == 'wheee') {
	echo '{"status":0,"message":"用户名以被注册"}';
} else {
	echo '{"status":1,"message":"用户名可以使用"}';
}



 ?>