<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use Core\Controller;
use Core\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return $this->view('auth/admin/category', 'Kategoriler', compact('categories'));
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $category = Category::where('category_id', $id)[0];

        return $this->view('auth/admin/category-edit', 'Kategori Düzenle', compact('category'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $category = Category::where('category_id', $id)[0];

        $name = $request->getBody()["name"] ?? null;
        $description = $request->getBody()["description"] ?? null;

        exit();


        redirect('/admin/category');
    }
}