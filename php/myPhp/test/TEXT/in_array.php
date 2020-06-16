<?php
$two_array = array(
    'one_num'  => [11, 22, 23, 12],
    'one1_num' => [11, 22, 23, 12],
    'one2_num' => [11, 22, 23, 12],
    'one3_num' => [11, 22, 23, 12],
);
var_dump(in_array(11, $two_array));
var_dump(in_array(11, $two_array['one1_num']));