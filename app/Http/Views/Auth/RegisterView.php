<?php

namespace App\Http\Views\Auth;

use App\Interfaces\Responses\Auth\RegisterResponseInterface;
use Illuminate\Support\Facades\View;

class RegisterView implements RegisterResponseInterface
{
    public function sendResponse(array $userInfo)
    {
        return View::make('dashboard', $userInfo);
    }
}
