<?php

namespace App\Controllers\Auth;

use App\Middlewares\RedirectAuthenticated;
use App\Middlewares\VerifyCsrfToken;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(VerifyCsrfToken::class);
        $this->middleware(RedirectAuthenticated::class);
    }

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

        $user = User::where('email', $email)[0];
        Session::add('user', $user['user_id']);
        redirect('/');

        return true;
    }
}