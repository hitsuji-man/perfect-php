<?php

use Basic1\Employee;

require __DIR__ . '/this_class.php';

$yamada = new Employee();
$yamada->name = '山田';
$yamada->setState('休憩している');

echo $yamada->name, 'さんは', $yamada->getState(), PHP_EOL;
