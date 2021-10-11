<?php

use App\Controllers\Admin\AdminController;
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

$app->router->get('/admin', [AdminController::class, 'index']);

$app->router->get('/admin/category', [CategoryController::class, 'index']);
$app->router->get('/admin/category/create', [CategoryController::class, 'create']);
$app->router->post('/admin/category/create', [CategoryController::class, 'store']);
$app->router->get('/admin/category/edit', [CategoryController::class, 'edit']);
$app->router->post('/admin/category/edit', [CategoryController::class, 'update']);


$app->router->get('/admin/user', [aUserController::class, 'index']);
$app->router->get('/admin/user/create', [aUserController::class, 'create']);
$app->router->post('/admin/user/create', [aUserController::class, 'store']);
$app->router->get('/admin/user/edit', [aUserController::class, 'edit']);
$app->router->post('/admin/user/edit', [aUserController::class, 'update']);


$app->router->get('/admin/news', [NewsController::class, 'index']);
$app->router->get('/admin/news/create', [NewsController::class, 'create']);
$app->router->post('/admin/news/create', [NewsController::class, 'store']);
$app->router->get('/admin/news/edit', [NewsController::class, 'edit']);
$app->router->post('/admin/news/edit', [NewsController::class, 'update']);
