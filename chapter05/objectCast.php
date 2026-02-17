<?php
$var = 1;
$var_obj = (object)$var;
echo $var_obj->scalar, PHP_EOL;

$array = array(
    'foo' => 2,
    'bar' => 3,
);
$array_obj = (object)$array;
echo $array_obj->foo, PHP_EOL;