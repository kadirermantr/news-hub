<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Core\Controller;
use Core\Session;

class RegisterController extends Controller
{
    public function index()
    {
        view('auth/register', 'Kaydol');
    }

    public function store()
    {
        $name = test_input($_POST["name"]);
        $lastname = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);

        $_SESSION = [
            'name'      => $name,
            'lastname'  => $lastname,
            'email'     => $email,
        ];

        if (validate_input() === true) {
            $isEmail = User::getWhere('users', 'email', $email);

            if (!empty($isEmail)) {
                Session::add('error', ["E-Posta adresi kullanılıyor."]);
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }

            User::create([
                'name'      => $name,
                'lastname'  => $lastname,
                'email'     => $email,
                'password'  => $password,
            ]);
        }

        echo "kayıt başarılı";

        return true;
    }
}