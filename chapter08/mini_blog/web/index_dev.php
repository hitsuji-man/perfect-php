<?php

require '../bootstrap.php';
require '../MiniBlogApplication.php';
// トップ(開発環境)
$app = new MiniBlogApplication(true);
$app->run();
