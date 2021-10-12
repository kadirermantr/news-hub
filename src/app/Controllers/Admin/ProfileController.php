<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['edit', 'update']));
    }

    public function edit()
    {
        $id = user('id');
        $user = User::where('id', $id)[0];

        return $this->view('auth/admin/user-profile', 'Profil', compact('user'));
    }

    public function update(Request $request)
    {
        $id = user('id');
        $user = User::where('id', $id)[0];

        $name = $request->getBody()["name"] ?? null;
        $lastname = $request->getBody()["lastname"] ?? null;
        $email = $request->getBody()["email"] ?? null;

        $isEmail = User::where('email', $email)[0];

        if (!empty($isEmail) && $isEmail !== $user) {
            Session::add('error', ["E-Posta adresi kullanılıyor."]);
            redirect('/admin/profile');
            exit();
        }

        User::update([
            'name'      => $name,
            'lastname'  => $lastname,
            'email'     => $email,
        ]);

        Session::add('success', "Kullanıcı bilgileri güncellendi.");
        redirect('/admin/profile');
    }
}