<?php
namespace Advanced;
class Employee
{
    const PARTTIME = 0x01;  // アルバイト
    const REGULAR = 0x02;   // 正社員
    const CONTRACT = 0x04;   // 契約社員

    private $name;
    private $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
}