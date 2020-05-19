<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/13
 * Time: 18:59
 */
include_once './../commin/session.php';
$one = $_GET['pass_one'];
echo $one;
?>
<?php
$two = $_POST['pass_two'];
//var_dump($_POST) ;
echo $one.'----'.$two;