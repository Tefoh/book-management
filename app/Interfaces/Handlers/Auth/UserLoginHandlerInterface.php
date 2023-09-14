<?php

namespace App\Interfaces\Handlers\Auth;

use App\Models\User;

interface UserLoginHandlerInterface
{
    public function loginUser(User $user): array;
}
