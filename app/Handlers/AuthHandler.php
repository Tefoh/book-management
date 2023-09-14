<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Auth\AuthHandlerInterface;
use App\Interfaces\Handlers\Auth\UserLoginHandlerInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthHandler implements AuthHandlerInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly UserLoginHandlerInterface $userLoginHandler,
    )
    { }

    public function login(array $userData): array|null
    {
        $user = $this->userRepository->getUserByEmail($userData['email']);

        if (! $user || ! $this->checkUserPassword($userData['password'], $user->password)) {
            return null;
        }

        return $this->userLoginHandler->loginUser($user);
    }

    public function register(array $userData): array
    {
        $user = $this->userRepository->createUser($userData);

        return $this->userLoginHandler->loginUser($user);
    }

    private function checkUserPassword(string $userPassword, string $hashedPassword): bool
    {
        return Hash::check(
            $userPassword,
            $hashedPassword
        );
    }
}
