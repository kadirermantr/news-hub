<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\HomeController;


$router->get('/', HomeController::class . '::index');
$router->get('/register', RegisterController::class . '::index');
$router->post('/register', RegisterController::class . '::store');