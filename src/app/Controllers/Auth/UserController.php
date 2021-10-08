<?php

namespace App\Controllers\Auth;

use App\Middlewares\Authenticate;
use Core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function index()
    {
        return $this->view('user/account', 'Hesap');
    }
}