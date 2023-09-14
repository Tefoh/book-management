<?php

namespace App\Interfaces\Responses\Auth;

use App\Models\User;

interface RegisterResponseInterface
{
    public function sendResponse(array $userInfo);
}
