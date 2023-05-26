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
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update', 'show']));
        $this->middleware(new RolePermissionChecker(3, ['index', 'create', 'store', 'edit', 'update', 'show', 'showActivity']));
    }

    public function index()
    {
        $users = array_reverse(User::all());
        $filtered_users = [];

        if (user('role_level') != 4) {
            for ($i=0; $i < count($users); $i++) {
                $role = (new User())->getRole($users[$i]['role_level']);
                $users[$i]['role'] = $role;

                if ($users[$i]['role_level'] < user('role_level')) {
                    $filtered_users[] = $users[$i];
                }
            }
        } else {
            for ($i=0; $i < count($users); $i++) {
                $role = (new User())->getRole($users[$i]['role_level']);
                $users[$i]['role'] = $role;
                $filtered_users = $users;
            }
        }

        return $this->view('auth/admin/user', 'Users', compact('filtered_users'));
    }

    public function create()
    {
        return $this->view('auth/admin/user-create', 'Add new user');
    }

    public function store(Request $request)
    {
        $name = $request->getBody()["name"] ?? null;
        $lastname = $request->getBody()["lastname"] ?? null;
        $email = $request->getBody()["email"] ?? null;
        $password = $request->getBody()["password"] ?? null;

        $isEmail = User::where([
            'email'     => $email
        ]);

        if (!empty($isEmail)) {
            Session::add('error', ["There is already a user with the same email."]);
            redirect('/admin/user/create');
            exit();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

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
        $user = User::where([
            'id'    => $id
        ]);

        if (empty($user)) {
            throw new NotFoundException();
        }

        $user[0]['role'] = (new User())->getRole($user[0]['role_level']);;
        $user = $user[0];

        return $this->view('auth/admin/user-edit', 'Edit user', compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $user = User::find($id);

        $role_level = $request->getBody()["new_role"] ?? null;

        if (is_null($role_level)) {
            $error_msg[] = "No role selected.";
            Session::add('error', $error_msg);
            redirect($_SERVER['REQUEST_URI']);
        }

        if (user('role_level') > $user['role_level']) {
            User::update([
                'role_level'    => $role_level,
            ]);
            redirect('/admin/user');
        } else {
            Session::add('error', ["You cannot modify users with equal or higher privileges than your own."]);
            redirect('/admin/user/edit?id=' . $id);
            exit();
        }
    }

    public function showActivity()
    {
        $log_file = __DIR__ . '/../../../storage/logs/app.log';
        $logs = file($log_file);
        $private_logs = '';

        if (user('role_level') == 3) {
            for ($i=0; $i < count($logs); $i++) {
                $first = strtok($logs[$i], ' ');
                if ($first != "Moderator" && $first != "Admin") {
                    $private_logs .= $logs[$i];
                }
            }
        } else {
            $private_logs = file_get_contents($log_file);
        }

        return $this->view('auth/admin/user-activitiy', 'Activities', compact('private_logs'));
    }
}
