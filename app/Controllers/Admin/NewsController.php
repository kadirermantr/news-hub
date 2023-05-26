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
        $this->middleware(new RolePermissionChecker(2, ['create', 'store']));
        $this->middleware(new RolePermissionChecker(3, ['index', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $news = array_reverse(News::all());

        for ($i=0; $i < count($news); $i++) {
            $user = (new News())->getUser($news[$i]['user_id']);
            $category = (new News())->getCategory($news[$i]['category_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['category'] = $category['name'];
            $news[$i]['date'] = date("Y/m/d", strtotime($news[$i]['date']));
        }

        return $this->view('auth/admin/news', 'News', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();

        return $this->view('auth/admin/news-create', 'Add news', compact('categories'));
    }

    public function store(Request $request)
    {
        $title = $request->getBody()["title"] ?? null;
        $content = $request->getBody()["content"] ?? null;
        $category_id = $request->getBody()["category_id"] ?? null;
        $file = $request->get("image");

        if (! isImage($file)) {
            $error_msg[] = "Resim kabul edilmedi.";
            Session::add('error', $error_msg);
            redirect($_SERVER['REQUEST_URI']);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $img_name = basename($file['name'], '.' . $extension);
        $new_img_name = $img_name . "-" . uniqid() . "." . $extension;

        $path = __DIR__ . '/../../../public/uploads/img/';
        move_uploaded_file($file['tmp_name'], $path . $new_img_name);

        if (is_null($category_id)) {
            $error_msg[] = "Kategori seçilmedi.";
            Session::add('error', $error_msg);
            redirect($_SERVER['REQUEST_URI']);
        }

        News::create([
            'title'         => $title,
            'content'       => $content,
            'user_id'       => user('id'),
            'category_id'   => $category_id,
            'image'         => $new_img_name,
        ]);

        redirect('/');
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $news = News::where([
            'id'    => $id
        ]);

        if (empty($news)) {
            throw new NotFoundException();
        }

        $news = $news[0];

        $dbCategory = $news['category_id'];
        $categories = Category::all();


        return $this->view('auth/admin/news-edit', 'Edit news', compact('news', 'categories', 'dbCategory'));
    }

    public function update(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        $action = $request->get('submit');

        if ($action === "delete") {
            $this->destroy($id);
        } else {
            $news = News::where([
                'id'    => $id
            ])[0];
            $title = $request->getBody()["title"] ?? null;
            $content = $request->getBody()["content"] ?? null;
            $category_id = $request->getBody()["category_id"] ?? null;

            if ($category_id === null) {
                Session::add('error', ["Please fill out all fields."]);
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

    public function apiNews(Request $request)
    {
        header('Content-Type: application/json;');
        $id = $request->get('id');

        if (empty($id)) {
            http_response_code(422);
            $messages = [
                'title' => 'Error',
                'content'   => 'The entered parameter is incorrect.',
            ];

            return json_encode($messages);
        }

        $news = News::find($id);

        if ($news == null) {
            http_response_code(404);
            $messages = [
                'title'     => 'Error',
                'content'   => 'No news found.',
            ];

            return json_encode($messages);
        }

        return json_encode($news);
    }

    public function apiAllNews(Request $request)
    {
        header('Content-Type: application/json;');
        $category_id = $request->get('category');

        if ($category_id) {
            $news = News::where(['category_id' => $category_id]);

            if ($news) {
                return json_encode($news);
            }

            http_response_code(404);
            $messages = [
                'title'     => 'Error',
                'content'   => 'No news found for this category.',
            ];

            return json_encode($messages);
        }

        $news = News::all();
        return json_encode($news);
    }
}
