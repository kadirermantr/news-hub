<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\Category;
use App\Models\EditorCategories;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update', 'destroy']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'create', 'store', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $categories = Category::all();

        return $this->view('auth/admin/category', 'Categories', compact('categories'));
    }

    public function create()
    {
        return $this->view('auth/admin/category-create', 'Add category');
    }

    public function store(Request $request)
    {
        $name = $request->getBody()["name"] ?? null;
        $description = $request->getBody()["description"] ?? null;

        $isCategory = Category::where([
            'name'  => $name
        ]);

        if (!empty($isCategory)) {
            Session::add('error', ["There is already a category with the same name."]);
            redirect('/admin/category/create');
            exit();
        }

        Category::create([
            'name'      => $name,
            'description'  => $description,
        ]);

        redirect('/admin/category');
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $category = Category::where([
            'id'    => $id
        ]);
        $users = User::where([
            'role_level'    => 2,
        ]);
        $editors = EditorCategories::where([
            'category_id'   => $id
        ]);

        if (empty($category)) {
            throw new NotFoundException();
        }

        for ($i=0; $i < count($users); $i++) {
            $users[$i]['is_editor'] = false;
        }

        for ($i=0; $i < count($users); $i++) {
            foreach ($editors as $editor) {
                if ($users[$i]['id'] == $editor['user_id']) {
                    $users[$i]['is_editor'] = true;
                }
            }
        }

        $category = $category[0];


        return $this->view('auth/admin/category-edit', 'Edit category', compact('category',  'users'));
    }

    public function update(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $action = $request->get('submit');

        if ($action === "delete") {
            $this->destroy($id);
        } else {
            $category = Category::where([
                'id'    => $id,
            ])[0];
            $name = $request->getBody()["name"] ?? null;
            $description = $request->getBody()["description"] ?? null;
            $users = $request->get('users');

            $isCategory = Category::where([
                'name'  => $name
            ])[0];

            if (!empty($isCategory) && $isCategory !== $category) {
                Session::add('error', ["There is already a category with the same name."]);
                redirect('/admin/category/edit?id=' . $id);
                exit();
            }

            if (isset($users)) {
                $old_relations = EditorCategories::where(['category_id' => $id]);

                foreach ($old_relations as $relation) {
                    EditorCategories::delete('category_id', $relation['category_id']);
                }

                foreach ($users as $user) {
                    EditorCategories::create([
                        'user_id'        => $user,
                        'category_id'    => $id,
                    ]);
                }
            } else {
                $old_relations = EditorCategories::where(['category_id' => $id]);

                foreach ($old_relations as $relation) {
                    EditorCategories::delete('category_id', $relation['category_id']);
                }
            }

            Category::update([
                'name'          => $name,
                'description'   => $description,
            ]);

            redirect('/admin/category');
        }
    }

    public function destroy($id)
    {
        Category::delete('id', $id);
        redirect('/admin/category');
    }
}
