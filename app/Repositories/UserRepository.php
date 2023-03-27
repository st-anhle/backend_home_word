<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function gelAllUser()
    {
        return User::all();
    }
}
