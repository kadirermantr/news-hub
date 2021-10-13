<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\Comment;
use App\Models\FollowedCategories;
use App\Models\News;
use App\Models\User;
use Core\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index']));
    }

    public function index()
    {
        $news = array_reverse(News::all());
        $comments = array_reverse(Comment::all());
        $users = FollowedCategories::where('user_id', user('id'));

        for ($i=0; $i < count($news); $i++) {
            $news[$i]['is_following'] = false;
        }

        for ($i=0; $i < count($news); $i++) {
            foreach ($users as $user_following) {
                if ($news[$i]['category_id'] == $user_following['category_id']) {
                    $news[$i]['is_following'] = true;

                    $user = (new News())->getUser($news[$i]['user_id']);
                    $category = (new News())->getCategory($news[$i]['category_id']);

                    $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
                    $news[$i]['category'] = $category['name'];
                    $news[$i]['date'] = date("d/m/Y", strtotime($news[$i]['date']));
                }
            }
        }

        for ($i=0; $i < count($comments); $i++) {
            $comment_news = (new User())->getNews($comments[$i]['news_id']);
            $comments[$i]['news'] = $comment_news['title'];
            $comments[$i]['date'] = date("d/m/Y - H:i", strtotime($comments[$i]['date']));
        }

        return $this->view('auth/admin/dashboard', 'Kontrol Paneli', compact('news', 'comments'));
    }
}