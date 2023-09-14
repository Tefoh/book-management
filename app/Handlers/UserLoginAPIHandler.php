<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Auth\UserLoginHandlerInterface;
use App\Models\User;

class UserLoginAPIHandler implements UserLoginHandlerInterface
{
    public function loginUser(User $user): array
    {
        $accessToken = $user->createToken('user_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $accessToken
        ];
    }
}
