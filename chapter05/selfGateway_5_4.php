<?php
class Foo {
    public function helloGateWay()
    {
        // コードが書かれているクラス
        self::hello();
    }

    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
}

class Bar extends Foo {
    public static function hello()
    {
        echo __CLASS__, ' hello!', PHP_EOL;
    }
}

$bar = new Bar();
$bar->helloGateWay();