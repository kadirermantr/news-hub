<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\UserController;
use App\Controllers\HomeController;


$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'login']);
$app->router->get('/logout', [LoginController::class, 'logout']);
$app->router->get('/account', [UserController::class, 'index']);