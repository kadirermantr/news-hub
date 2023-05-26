<?php

namespace App\Models;

use Core\Model;

class UserRequest extends Model
{
    protected static string $table = "requests";

    public function getUser(int $user_id)
    {
        return User::find($user_id);
    }
}
