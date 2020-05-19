<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/19
 * Time: 14:38
 */
$open = include_once './key.php';
$a = fopen('./key.php', 'w');
fwrite( $a, array (
    'key' => 'aaa',
    'aa'  => 'bbb',
    'aa1' => 'ccc'
));