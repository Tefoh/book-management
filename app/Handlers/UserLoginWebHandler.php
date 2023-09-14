<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Auth\UserLoginHandlerInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLoginWebHandler implements UserLoginHandlerInterface
{

    public function loginUser(User $user): array
    {
        Auth::login($user);

        return [
            'user' => $user,
        ];
    }
}
