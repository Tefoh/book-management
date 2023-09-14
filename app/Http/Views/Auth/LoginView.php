<?php

namespace App\Http\Views\Auth;

use App\Interfaces\Responses\Auth\LoginResponseInterface;
use Illuminate\Support\Facades\View;

class LoginView implements LoginResponseInterface
{
    public function sendResponse(array $userInfo)
    {
        return View::make('dashboard', $userInfo);
    }
}
