<?php

namespace App\Models;

use Core\Model;

class Comment extends Model
{
    protected static string $table = "comments";

    public function getUser(int $user_id)
    {
        return User::find($user_id);
    }

    public function getNews(int $news_id)
    {
        return News::find($news_id);
    }

    public function getSummary(string $data): string
	{
        $end = strlen($data) > 30 ? "..." : "";
        return mb_substr($data, 0, 30) . $end;
    }
}
