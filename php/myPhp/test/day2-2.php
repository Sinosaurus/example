<?php
    header('context-type: text/html; charset=utf8');
    $aa = '1131';
    function sa() {
        return $GLOBALS['aa'];
    };
//    die(sa());
//    exit(sa());
    echo sa();
    //预编译
    echo B();
    function b() {
        return 1;
    }
//    echo $c;
//    $c = 1221;
echo '<hr />';
//global
//要求 全局 局部变量，相互访问
    $var = 11;
    function ara() {
        $b1 = 11;
//        $cc = $var * $b;
        $cc = $GLOBALS['var']*$b1;
        return $cc;
    }
    echo ara();
    echo '<br>';
//    echo $GLOBALS['b1'];

function call1()
{
    $_GET['$A']=100;
    $GLOBALS['b'] = 12;
}
call1();
echo $_GET['$A'].'<br>';
echo $GLOBALS['b'];