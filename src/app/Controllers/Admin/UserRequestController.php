<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\User;
use App\Models\UserRequest;
use Core\Controller;
use Core\Request;

class UserRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'edit', 'update']));
    }

    public function index()
    {
        $user_requests = array_reverse(UserRequest::all());

        for ($i=0; $i < count($user_requests); $i++) {
            $user = (new UserRequest())->getUser($user_requests[$i]['user_id']);
            $user_requests[$i]['user'] = $user['name'] . " " . $user['lastname'];
        }

        return $this->view('auth/admin/user-request', 'Hesap silme istekleri', compact('user_requests'));
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $user_request = UserRequest::where('id', $id);

        if (empty($user_request)) {
            throw new NotFoundException();
        }

        $user = (new UserRequest())->getUser($user_request[0]['user_id']);
        $user_request[0]['user'] = $user['name'] . " " . $user['lastname'];

        $user_request = $user_request[0];

        return $this->view('auth/admin/user-request-edit', 'Hesap silme isteğini düzenle', compact('user_request'));
    }

    public function destroy(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        User::delete('id', $id);

        redirect('/admin/user/request');
    }
}