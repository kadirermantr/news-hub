<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected static $table = "users";

    public static function getRole(int $role_level)
    {
        switch ($role_level) {
            case 1:
                $role_name = "Kullanıcı";
                break;
            case 2:
                $role_name = "Editör";
                break;
            case 3:
                $role_name = "Moderatör";
                break;
            case 4:
                $role_name = "Admin";
                break;
        }

        return $role_name;
    }

    public function getRequest(int $user_id)
    {
        return UserRequest::where([
            'user_id'   =>  $user_id
        ]);
    }

    public function getNews(int $news_id)
    {
        return News::find($news_id);
    }
}