<?php

namespace App\Repositories;

interface UserRepositoryInterface {
    public function gelAllUser();
    public function getUserById($id);
    public function deleteUser($id);
}