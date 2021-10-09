<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\User;
use Core\Controller;
use Core\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $this->view('auth/admin/users', 'Kullanıcılar', compact('users'));
    }
}