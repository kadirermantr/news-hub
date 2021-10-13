<?php

namespace App\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Middlewares\Authenticate;
use App\Middlewares\RolePermissionChecker;
use App\Models\Comment;
use Core\Controller;
use Core\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(new Authenticate(['index', 'edit', 'update', 'destroy']));
        $this->middleware(new RolePermissionChecker(2, ['index', 'edit', 'update', 'destroy']));
    }

    public function index()
    {
        $comments = array_reverse(Comment::all());

        for ($i=0; $i < count($comments); $i++) {
            $post = (new Comment())->getNews($comments[$i]['news_id']);
            $content = (new Comment())->getSummary($comments[$i]['content']);

            $comments[$i]['news'] = $post['title'];
            $comments[$i]['date'] = date("d/m/Y - H:i", strtotime($comments[$i]['date']));
            $comments[$i]['content'] = $content;

            if ($comments[$i]['user_id'] === null) {
                $comments[$i]['user'] = "Anonim";
            } else {
                $user = (new Comment())->getUser($comments[$i]['user_id']);
                $comments[$i]['user'] = $user['name'] . " " . $user['lastname'];
            }
        }

        return $this->view('auth/admin/comment', 'Yorumlar', compact('comments'));
    }

    /**
     * @throws NotFoundException
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $comments = Comment::where('id', $id);

        if (empty($comments)) {
            throw new NotFoundException();
        }

        $post = (new Comment())->getNews($comments[0]['news_id']);
        $comments[0]['date'] = date("d/m/Y - H:i", strtotime($comments[0]['date']));
        $comments[0]['news'] = $post['title'];

        if ($comments[0]['user_id'] === null) {
            $comments[0]['user'] = "Anonim";
        } else {
            $user = (new Comment())->getUser($comments[0]['user_id']);
            $comments[0]['user'] = $user['name'] . " " . $user['lastname'];
        }

        $comments = $comments[0];

        return $this->view('auth/admin/comment-edit', 'Yorumu düzenle', compact('comments'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $action = $request->get('submit');

        if ($action === "delete") {
            $this->destroy($id);
        } else {
            $content = $request->getBody()["content"] ?? null;

            Comment::update([
                'content'     => $content,
            ]);

            redirect('/admin/comment');
        }
    }

    public function destroy($id)
    {
        Comment::delete('id', $id);
        redirect('/admin/comment');
    }
}