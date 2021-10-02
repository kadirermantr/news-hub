<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $name = "Kadir";
        $lastname = "Erman";

        return view('home', 'Homepage', compact('name', 'lastname'));
    }
}