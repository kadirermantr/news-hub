<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'create', 'store', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $users = array_reverse(User::all());

        for ($i=0; $i < count($users); $i++) {
            $role = (new User())->getRole($users[$i]['role_level']);
            $users[$i]['role'] = $role;
        }

        return $this->view('auth/admin/user', 'Kullanıcılar', compact('users'));
    }

    public function create()
    {
        return $this->view('auth/admin/user-create', 'Kullanıcı ekle');
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
            redirect('/admin/user/create');
            exit();
        }

        User::create([
            'name'      => $name,
            'lastname'  => $lastname,
            'email'     => $email,
            'password'  => $password,
        ]);

        redirect('/admin/user');
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $user = User::where('id', $id);

        if (empty($user)) {
            throw new NotFoundException();
        }

        $user[0]['role'] = (new User())->getRole($user[0]['role_level']);;
        $user = $user[0];

        return $this->view('auth/admin/user-edit', 'Kullanıcıyı düzenle', compact('user'));
    }

    public function update(Request $request)
    {
        $role_level = $request->getBody()["new_role"] ?? null;

        if (is_null($role_level)) {
            $error_msg[] = "Rol seçilmedi.";
            Session::add('error', $error_msg);
            redirect($_SERVER['REQUEST_URI']);
        }

        User::update([
            'role_level'    => $role_level,
        ]);

        redirect('/admin/user');
    }
}