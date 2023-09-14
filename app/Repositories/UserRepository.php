<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers(): Collection
    {
        // TODO: Implement getAllUsers() method.
    }

    public function getAllPaginatedUsers(): Collection
    {
        // TODO: Implement getAllPaginatedUsers() method.
    }

    public function getUserById($userId): User
    {
        // TODO: Implement getUserById() method.
    }

    public function deleteUser($userId): bool
    {
        // TODO: Implement deleteUser() method.
    }

    public function createUser(array $userData): User
    {
        // TODO: Implement createUser() method.
    }

    public function updateUser($userId, array $newData): User
    {
        // TODO: Implement updateUser() method.
    }
}
