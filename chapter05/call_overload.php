<?php
require('overload_5_3.php');

$obj = new SomeClass();
$obj->foo = 10;
var_dump($obj->foo);

var_dump(isset($obj->foo));
var_dump(empty($obj->foo));

unset($obj->foo);
var_dump(isset($obj->foo));

$obj->bar('baz');
SomeClass::staticBar('baz');