<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index']));
    }

    public function index()
    {
        return $this->view('auth/admin/index', 'Yönetim Paneli');
    }
}