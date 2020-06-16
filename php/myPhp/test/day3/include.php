<?php
/*include_once "./array-1.php";
include_once "./array-1.php";//虽然再写一遍，但是不会执行*/
require "./array-4.php";
echo '---------------------------------------------------';
require "./array-4.php";//居然可以重复引用

require_once "./string-1.php";
require_once "./string-1.php";//只执行一个


