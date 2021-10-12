<?php

namespace App\Controllers\Admin;

use App\Middlewares\Authenticate;
use App\Models\Comment;
use App\Models\User;
use Core\Controller;
use Core\Request;
use Core\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index']));
    }

    public function index()
    {
        $comments = Comment::all();

        for ($i=0; $i < count($comments); $i++) {
            $news = (new User())->getNews($comments[$i]['news_id']);
            $comments[$i]['news'] = $news['title'];
            $comments[$i]['date'] = date("d/m/Y - H:i", strtotime($comments[$i]['date']));
        }

        return $this->view('auth/admin/dashboard', 'Kontrol Paneli', compact('comments'));
    }
}