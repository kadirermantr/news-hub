<?php

namespace App\Controllers\Auth;

use App\Middlewares\Authenticate;
use Core\Controller;
use Core\Session;

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

    public function logout() {
        Session::close();
        redirect('/');
    }
}