<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\Comment;
use App\Models\FollowedCategories;
use App\Models\News;
use App\Models\ReadedNews;
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

        $following_categories = FollowedCategories::where(['user_id' => user('id')]);
        $reading_news = ReadedNews::where(['user_id' => user('id')]);

        for ($i=0; $i < count($news); $i++) {
            $news[$i]['is_following'] = false;
            $news[$i]['is_reading'] = false;
        }

        for ($i=0; $i < count($news); $i++) {
            foreach ($following_categories as $following_category) {
                if ($news[$i]['category_id'] == $following_category['category_id']) {
                    $news[$i]['is_following'] = true;
                }
            }

            foreach ($reading_news as $reading_post) {
                if ($news[$i]['id'] == $reading_post['news_id']) {
                    $news[$i]['is_reading'] = true;
                }
            }

            $user = (new News())->getUser($news[$i]['user_id']);
            $category = (new News())->getCategory($news[$i]['category_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['category'] = $category['name'];
            $news[$i]['date'] = date("Y/m/d", strtotime($news[$i]['date']));
        }

        for ($i=0; $i < count($comments); $i++) {
            $comment_news = (new User())->getNews($comments[$i]['news_id']);
            $comments[$i]['news'] = $comment_news['title'];
            $comments[$i]['date'] = date("Y/m/d - H:i", strtotime($comments[$i]['date']));
        }


        return $this->view('auth/admin/dashboard', 'Control Panel', compact('news', 'comments'));
    }
}
