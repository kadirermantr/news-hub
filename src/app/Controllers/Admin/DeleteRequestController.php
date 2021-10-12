<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\DeleteRequest;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class DeleteRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['edit', 'update']));
    }

    public function edit()
    {
        $id = user('id');

        $user = User::where('id', $id)[0];
        $user['request'] = (new User())->getRequest($id);

        return $this->view('auth/admin/user-delete-request', 'Hesabı Sil', compact('user'));
    }

    public function update(Request $request)
    {
        $user_id = user('id');
        $action = $request->get('submit');

        if ($action === "request") {
            DeleteRequest::create([
                'user_id'   => $user_id,
            ]);
        } else {
            $delete_request = DeleteRequest::where('user_id', $user_id)[0];
            $request_id = $delete_request['id'];

            DeleteRequest::delete('id', $request_id);
        }

        redirect('/admin/profile/delete');
    }
}