<?php

namespace App\Models;

use Core\Model;

class News extends Model
{
    protected static $table = "news";

    public function getUser(int $user_id)
    {
        return User::find($user_id);
    }

    public function getCategory(int $category_id)
    {
        return Category::find($category_id);
    }

    public function getSummary(string $data)
    {
        $end = strlen($data) > 200 ? "..." : "";
        return mb_substr($data, 0, 200) . $end;
    }
}