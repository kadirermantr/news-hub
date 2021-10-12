<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\Category;
use App\Models\News;
use Core\Controller;
use Core\Request;
use Core\Session;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'create', 'store', 'edit', 'update', 'destroy']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'create', 'store', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $news = News::all();

        for ($i=0; $i < count($news); $i++) {
            $user = (new News())->getUser($news[$i]['user_id']);
            $category = (new News())->getCategory($news[$i]['category_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['category'] = $category['name'];
            $news[$i]['date'] = date("d/m/Y", strtotime($news[$i]['date']));
        }

        return $this->view('auth/admin/news', 'Haberler', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();

        return $this->view('auth/admin/news-create', 'Haber ekle', compact('categories'));
    }

    public function store(Request $request)
    {
        $title = $request->getBody()["title"] ?? null;
        $content = $request->getBody()["content"] ?? null;
        $category_id = $request->getBody()["category_id"] ?? null;

        if (is_null($category_id)) {
            $error_msg[] = "Kategori seçilmedi.";
            Session::add('error', $error_msg);
            redirect($_SERVER['REQUEST_URI']);
        }

        News::create([
            'title'    => $title,
            'content'  => $content,
            'user_id'  => user('id'),
            'category_id'   => $category_id,
        ]);

        redirect('/admin/news');
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $news = News::where('id', $id);

        if (empty($news)) {
            throw new NotFoundException();
        }

        $news = $news[0];

        $dbCategory = $news['category_id'];
        $categories = Category::all();


        return $this->view('auth/admin/news-edit', 'Haberi düzenle', compact('news', 'categories', 'dbCategory'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $action = $request->get('submit');

        if ($action === "delete") {
            $this->destroy($id);
        } else {
            $news = News::where('id', $id)[0];
            $title = $request->getBody()["title"] ?? null;
            $content = $request->getBody()["content"] ?? null;
            $category_id = $request->getBody()["category_id"] ?? null;

            if ($category_id === null) {
                Session::add('error', ["Tüm alanları doldurun."]);
                redirect('/admin/news/edit?id=' . $id);
            }

            News::update([
                'title'         => $title,
                'content'       => $content,
                'user_id'       => user('id'),
                'category_id'   => $category_id,
            ]);

            redirect('/admin/news');
        }
    }

    public function destroy($id)
    {
        News::delete('id', $id);
        redirect('/admin/news');
    }
}