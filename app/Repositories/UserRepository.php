<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers(): Collection
    {
        return User::query()->get();
    }

    public function getPaginatedUsers($total = null): LengthAwarePaginator
    {
        return User::query()->paginate($total);
    }

    public function getUserByIdBuilder($userId): Builder
    {
        return User::query()
            ->where('id', $userId);
    }

    public function getUserById($userId): Builder|User|null
    {
        return $this
            ->getUserByIdBuilder($userId)
            ->first();
    }

    public function deleteUser($userId): bool
    {
        return $this
            ->getUserByIdBuilder($userId)
            ->delete();
    }

    public function createUser(array $userData): Builder|User
    {
        $userData['password'] = Hash::make($userData['password']);
        return User::query()->create($userData);
    }

    public function updateUser($userId, array $newData): User
    {
        /**
         *  This will result two queries but with this approach
         *  the eloquent update event will trigger.
         */
        return tap(
            $this->getUserByIdBuilder($userId)
                ->first()
        )
            ->update($newData);
    }

    public function getUserByEmail($email): Builder|User|null
    {
        return User::query()
            ->where('email', $email)
            ->first();
    }
}
