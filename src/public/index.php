<?php

use Core\Router;
use Core\Session;

require __DIR__ . '/../vendor/autoload.php';

Session::init();

$router = new Router();

require __DIR__ . '/../app/routes.php';

$router->addNotFoundHandler(function () {
    require_once __DIR__ . '/../app/views/404.php';
});

$router->run();