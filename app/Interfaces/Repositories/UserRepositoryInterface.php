<?php

namespace App\Interfaces\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAllUsers(): Collection;
    public function getPaginatedUsers($total = null): LengthAwarePaginator;
    public function getUserById($userId): User;
    public function deleteUser($userId): bool;
    public function createUser(array $userData): User;
    public function updateUser($userId, array $newData): User;
}
