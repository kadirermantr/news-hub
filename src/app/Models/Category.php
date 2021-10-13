<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected static $table = "categories";


    public function getFollower(int $category_id)
    {
        return FollowedCategories::where('category_id', $category_id);
    }
}