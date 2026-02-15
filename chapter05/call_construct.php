<?php
use Advanced\Employee;

require('class_construct.php');
$yamada = new Employee('山田', Employee::REGULAR);

echo $yamada->getName(), 'さんは、', $yamada->getTypeLabel(), 'で働いています.'. PHP_EOL;