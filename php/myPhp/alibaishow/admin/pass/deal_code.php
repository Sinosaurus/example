<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 12:15
 */
session_start();
$a =  $_POST['val'];
$b =  $_SESSION['key'];

if ($a == $b) {
    echo $a.'------'.$b;
} else {
    echo $a.'------'.$b;
}