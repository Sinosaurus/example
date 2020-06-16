<?php
/**
 * Created by PhpStorm.
 * User: Sinosaurus
 * Date: 2018/1/15
 * Time: 9:26
 */
/**
 * 学习对象
 */
class Computer {
    public $a = 'a';
    public $b = 'b';
    private $c = 'c';
    public function boo() {
        echo $this->a;
    }
};
$c = new Computer();/*
echo '<pre>';
var_dump($c);*/
$c -> boo();

