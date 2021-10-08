<?php

namespace App\Controllers\Auth;

use App\Middlewares\AuthMiddleware;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(new AuthMiddleware(['index']));
    }

    public function index()
    {
        return $this->view('user/account', 'Hesap');
    }
}