<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\UserRequest;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['edit', 'update', 'show', 'store']));
    }

    public function edit()
    {
        $id = user('id');
        $user = User::where([
            'id'    => $id
        ])[0];

        return $this->view('auth/admin/user-profile', 'Profil', compact('user'));
    }

    public function update(Request $request)
    {
        $id = user('id');
        $user = User::where([
            'id'    => $id
        ])[0];

        $name = $request->getBody()["name"] ?? null;
        $lastname = $request->getBody()["lastname"] ?? null;
        $email = $request->getBody()["email"] ?? null;

        $isEmail = User::where([
            'email' => $email
        ])[0];

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

    public function show()
    {
        $id = user('id');

        $user = User::where([
            'id'    => $id
        ])[0];
        $user['request'] = (new User())->getRequest($id);

        return $this->view('auth/admin/user-profile-delete', 'Hesabı Sil', compact('user'));
    }

    public function store(Request $request)
    {
        $user_id = user('id');
        $action = $request->get('submit');

        if ($action === "request") {
            UserRequest::create([
                'user_id'   => $user_id,
            ]);
        } else {
            $delete_request = UserRequest::where([
                'user_id'   => $user_id
            ])[0];
            UserRequest::delete('id', $delete_request['id']);
        }

        redirect('/admin/profile/delete');
    }
}