<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Comment;
use App\Models\News;
use Core\Controller;
use Core\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::all();

        for ($i=0; $i < count($news); $i++) {
            $content = (new News())->getSummary($news[$i]['content']);
            $user = (new News())->getUser($news[$i]['user_id']);
            $category = (new News())->getCategory($news[$i]['category_id']);

            $news[$i]['user'] = $user['name'] . " " . $user['lastname'];
            $news[$i]['category'] = $category['name'];
            $news[$i]['date'] = date("d/m/Y", strtotime($news[$i]['date']));
            $news[$i]['content'] = $content;
        }

        return $this->view('home', 'Anasayfa', compact('news'));
    }

    /**
     * @throws NotFoundException
     */
    public function show(Request $request)
    {
        $id = $request->get('id');
        $news = News::where('id', $id);
        $comments = Comment::all();
        $newsComments = [];

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

        return $this->view('news', 'Haber', compact('news','newsComments' ));
    }

    public function store(Request $request)
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
            'user_id'  => $user_id,
            'news_id' => $news_id,
        ]);

        redirect('/news?id=' . $news_id);
    }
}