<?php

namespace App\Controllers\Admin;

use Core\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return $this->view('auth/admin/news', 'Haberler');
    }
}