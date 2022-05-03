<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function createUser($data, $role)
    {
        $user = User::create($data);
        $user->role = $role;
        $user->save();

        return $user;
    }
}
