<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\UserController as aUserController;
use App\Controllers\Admin\NewsController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\UserController;
use App\Controllers\HomeController;
use Core\Controller;


$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);

$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'login']);

$app->router->get('/logout', [UserController::class, 'logout']);
$app->router->get('/account', [UserController::class, 'index']);


//////////////////////////////////////////////////////////////////////////////////////////

$app->router->get('/admin', function () {
    return Controller::view('auth/admin/index', 'Yönetim Paneli');
});


$app->router->get('/admin/category', [CategoryController::class, 'index']);
$app->router->get('/admin/category/edit', [CategoryController::class, 'edit']);
$app->router->post('/admin/category/edit', [CategoryController::class, 'update']);



$app->router->get('/admin/news', [NewsController::class, 'index']);
$app->router->get('/admin/users', [aUserController::class, 'index']);
