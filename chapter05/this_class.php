<?php
namespace Basic1;
class Employee
{
    public $name;
    private $state = '働いている';

    // privateなプロパティをアクセスするメソッド
    public function getState()
    {
        return $this->state;
    }

    // privateなプロパティを変更するメソッド
    public function setState($state)
    {
        $this->state = $state;
    }

    public function work()
    {
        echo '書類を整理しています', PHP_EOL;
    }
    
}