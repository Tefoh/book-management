<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers(): Collection
    {
        // TODO: Implement getAllUsers() method.
    }

    public function getPaginatedUsers($total = null): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedUsers() method.
    }

    public function getUserById($userId): Builder|User|null
    {
        // TODO: Implement getUserById() method.
    }

    public function deleteUser($userId): bool
    {
        // TODO: Implement deleteUser() method.
    }

    public function createUser(array $userData): Builder|User
    {
        // TODO: Implement createUser() method.
    }

    public function updateUser($userId, array $newData): User
    {
        // TODO: Implement updateUser() method.
    }
}
