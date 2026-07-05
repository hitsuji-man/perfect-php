<?php

require '../bootstrap.php';
require '../MiniBlogApplication.php';
// トップ画面
$app = new MiniBlogApplication(false);
$app->run();
