<?php

use App\Controllers\Admin\CommentController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\DeleteRequestController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\UserController;
use App\Controllers\Admin\NewsController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\HomeController;


$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/news', [HomeController::class, 'show']);
$app->router->post('/news', [HomeController::class, 'store']);


$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'login']);
$app->router->get('/logout', [LoginController::class, 'logout']);

//////////////////////////////////////////////////////////////////////////////////////////

$app->router->get('/admin', [DashboardController::class, 'index']);
$app->router->get('/admin/profile', [ProfileController::class, 'edit']);
$app->router->post('/admin/profile', [ProfileController::class, 'update']);
$app->router->get('/admin/profile/delete', [DeleteRequestController::class, 'edit']);
$app->router->post('/admin/profile/delete', [DeleteRequestController::class, 'update']);


$app->router->get('/admin/news', [NewsController::class, 'index']);
$app->router->get('/admin/news/create', [NewsController::class, 'create']);
$app->router->post('/admin/news/create', [NewsController::class, 'store']);
$app->router->get('/admin/news/edit', [NewsController::class, 'edit']);
$app->router->post('/admin/news/edit', [NewsController::class, 'update']);


$app->router->get('/admin/category', [CategoryController::class, 'index']);
$app->router->get('/admin/category/create', [CategoryController::class, 'create']);
$app->router->post('/admin/category/create', [CategoryController::class, 'store']);
$app->router->get('/admin/category/edit', [CategoryController::class, 'edit']);
$app->router->post('/admin/category/edit', [CategoryController::class, 'update']);


$app->router->get('/admin/comment', [CommentController::class, 'index']);
$app->router->get('/admin/comment/edit', [CommentController::class, 'edit']);
$app->router->post('/admin/comment/edit', [CommentController::class, 'update']);


$app->router->get('/admin/user', [UserController::class, 'index']);
$app->router->get('/admin/user/create', [UserController::class, 'create']);
$app->router->post('/admin/user/create', [UserController::class, 'store']);
$app->router->get('/admin/user/edit', [UserController::class, 'edit']);
$app->router->post('/admin/user/edit', [UserController::class, 'update']);
