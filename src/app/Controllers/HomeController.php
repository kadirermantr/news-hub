<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FollowedCategories;
use App\Models\News;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class HomeController extends Controller
{
    public function index()
    {
        $news = array_reverse(News::all());
        $categories = Category::all();

        for ($i=0; $i < count($news); $i++) {
            $content = (new News())->getSummary($news[$i]['content']);
            $user = (new News())->getUser($news[$i]['user_id']);
            $category = (new News())->getCategory($news[$i]['category_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['category'] = $category['name'];
            $news[$i]['date'] = date("d/m/Y", strtotime($news[$i]['date']));
            $news[$i]['content'] = $content;
        }

        return $this->view('home', 'Anasayfa', compact('news', 'categories'));
    }

    /**
     * @throws NotFoundException
     */
    public function showNews(Request $request)
    {
        $id = $request->get('id');
        $news = News::where('id', $id);
        $comments = Comment::all();
        $newsComments = [];
        $categories = Category::all();

        for ($i=0; $i < count($comments); $i++) {

            if ($id === $comments[$i]['news_id']) {
                if (is_null($comments[$i]['user_id'])) {
                    $comments[$i]['user'] = "Anonim";
                } else {
                    $user = (new Comment())->getUser($comments[$i]['user_id']);
                    $comments[$i]['user'] = $user['name'] . " " . $user['lastname'];
                }

                $comments[$i]['date'] = date("d/m/Y - H:i", strtotime($comments[$i]['date']));
                $newsComments[] = $comments[$i];
            }
        }

        if (empty($news)) {
            throw new NotFoundException();
        }

        $news = $news[0];

        return $this->view('news', 'Haber', compact('news','categories', 'newsComments'));
    }

    public function storeComment(Request $request)
    {
        $content = $request->getBody()["content"] ?? null;
        $news_id = $request->get('id');
        $anonymous = $request->getBody()['anonymous'] ?? null;

        if ($anonymous || isGuest()) {
            $user_id = null;
        } else {
            $user_id = user('id');
        }

        Comment::create([
            'content' => $content,
            'user_id' => $user_id,
            'news_id' => $news_id,
        ]);

        redirect('/news?id=' . $news_id);
    }

    /**
     * @throws NotFoundException
     */
    public function showCategory(Request $request) {
        $id = $request->get('id');
        $category = Category::where('id', $id);
        $categories = Category::all();
        $user = [];

        if (empty($category)) {
            throw new NotFoundException();
        }

        $news = News::where('category_id', $id);

        if (empty($news)) {
            Session::add('error', ['Bu kategoride hiç haber yok.']);
        }

        $news = array_reverse($news);

        for ($i=0; $i < count($news); $i++) {
            $content = (new News())->getSummary($news[$i]['content']);
            $user = (new News())->getUser($news[$i]['user_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['date'] = date("d/m/Y", strtotime($news[$i]['date']));
            $news[$i]['content'] = $content;
        }

        $category = $category[0];

        if (!isGuest()) {
            $user_id = user('id');
            $followers = (new Category())->getFollower($category['id']);

            foreach ($followers as $follower) {
                if ($user_id === $follower['user_id']) {
                    $user['category_followed'] = true;
                }
            }

        }
        return $this->view('category', $category['name'] . ' Haberleri', compact('category', 'categories', 'news', 'user'));
    }

    public function followCategory(Request $request)
    {
        $action = $request->get('submit');
        $user_id = user('id');
        $category_id = $request->getBody()['id'] ?? null;

        if ($action === "follow") {
            FollowedCategories::create([
                'user_id'       => $user_id,
                'category_id'   => $category_id,
            ]);
        } else {
            $delete_following_category = FollowedCategories::where('category_id', $category_id)[0];
            FollowedCategories::delete('id', $delete_following_category['id']);
        }

        redirect('/category?id=' . $category_id);
    }
}