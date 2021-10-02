<?php

use Core\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

require __DIR__ . '/../app/routes.php';

$router->addNotFoundHandler(function () {
    require_once __DIR__ . '/../app/views/404.php';
});

$router->run();