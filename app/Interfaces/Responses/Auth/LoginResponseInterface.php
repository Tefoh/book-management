<?php

namespace App\Interfaces\Responses\Auth;

use App\Models\User;

interface LoginResponseInterface
{
    public function sendResponse(array $userInfo);
}
