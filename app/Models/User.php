<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected static string $table = "users";

    public static function getRole(int $role_level): string
	{
		return match ($role_level) {
			1 => 'User',
			2 => 'Editor',
			3 => 'Moderator',
			4 => 'Admin',
			default => 'Unknown',
		};
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
