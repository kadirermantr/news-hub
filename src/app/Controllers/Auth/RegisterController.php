<?php

namespace App\Controllers\Auth;

use App\Middlewares\AuthMiddleware;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return $this->view('auth/register', 'Kaydol');
    }

    public function store(Request $request)
    {
        $name = $request->getBody()["name"] ?? null;
        $lastname = $request->getBody()["lastname"] ?? null;
        $email = $request->getBody()["email"] ?? null;
        $password = $request->getBody()["password"] ?? null;

        $isEmail = User::where('email', $email);

        if (!empty($isEmail)) {
            Session::add('error', ["E-Posta adresi kullanılıyor."]);
            redirect('/register');
            exit();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        User::create([
            'name'      => $name,
            'lastname'  => $lastname,
            'email'     => $email,
            'password'  => $password,
        ]);

        echo "kayıt başarılı";

        return true;
    }
}