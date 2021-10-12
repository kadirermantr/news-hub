<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\Category;
use Core\Controller;
use Core\Request;
use Core\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'create', 'store', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $categories = Category::all();

        return $this->view('auth/admin/category', 'Kategoriler', compact('categories'));
    }

    public function create()
    {
        return $this->view('auth/admin/category-create', 'Kategori ekle');
    }

    public function store(Request $request)
    {
        $name = $request->getBody()["name"] ?? null;
        $description = $request->getBody()["description"] ?? null;

        $isCategory = Category::where('name', $name);

        if (!empty($isCategory)) {
            Session::add('error', ["Aynı isimde bir kategori zaten var."]);
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
        $id = $request->get('id');
        $category = Category::where('id', $id);

        if (empty($category)) {
            throw new NotFoundException();
        }

        $category = $category[0];

        return $this->view('auth/admin/category-edit', 'Kategoriyi düzenle', compact('category'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $action = $request->get('submit');

        if ($action === "delete") {
            $this->destroy($id);
        } else {
            $category = Category::where('id', $id)[0];
            $name = $request->getBody()["name"] ?? null;
            $description = $request->getBody()["description"] ?? null;

            $isCategory = Category::where('name', $name)[0];

            if (!empty($isCategory) && $isCategory !== $category) {
                Session::add('error', ["Aynı isimde bir kategori zaten var."]);
                redirect('/admin/category/edit?id=' . $id);
                exit();
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