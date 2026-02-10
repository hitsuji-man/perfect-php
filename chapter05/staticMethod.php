<?php
namespace Basic2;
class Employee 
{
    private static $company = '技術評論社';

    public static function getCompany()
    {
        return self::$company;
    }

    public static function setCompany($value)
    {
        self::$company = $value;
    }
}

echo Employee::getCompany(), PHP_EOL;
Employee::setCompany('new会社');
echo Employee::getCompany(), PHP_EOL;