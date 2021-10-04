<?php

namespace App\Controllers\Auth;

use App\Models\User;
use Core\Controller;

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

        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;

        $isEmail = User::getWhere('users', 'email', $email);

        if (validate_input() === true) {
            if (!empty($isEmail)) {
                session_start();

                $_SESSION['error'] = ["E-Posta adresi kullanılıyor."];
                header("Location: " . $_SERVER['REQUEST_URI']);
                return false;
            }

            User::create([
                'name'      => $name,
                'lastname'  => $lastname,
                'email'     => $email,
                'password'  => $password,
            ]);
        }

        return true;
    }
}