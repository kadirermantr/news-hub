<?php

namespace App\Controllers\Auth;

use App\Middlewares\Authenticate;
use Core\Controller;
use Core\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index']));
    }

    public function index()
    {
        return $this->view('auth/user/account', 'Hesap');
    }

    public function logout() {
        Session::close();
        redirect('/');
    }
}