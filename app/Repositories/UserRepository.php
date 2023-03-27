<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function gelAllUser()
    {
        return User::all();
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }
}
