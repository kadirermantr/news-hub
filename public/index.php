<?php

use Core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

require __DIR__ . '/../app/routes.php';

$app->run();