<?php

namespace App\Http\Controllers\v1\Auth;

use App\Interfaces\Handlers\Auth\RegisterHandlerInterface;
use App\Interfaces\Requests\Auth\RegisterRequestInterface;
use App\Interfaces\Responses\Auth\RegisterResponseInterface;

class RegisterController
{
    public function __construct(
        private readonly RegisterHandlerInterface $registerHandler,
        private readonly RegisterResponseInterface $registerResponse
    )
    { }

    public function __invoke(RegisterRequestInterface $request)
    {
        $userInfo = $this->registerHandler->register(
            $request->validated()
        );

        return $this->registerResponse->sendResponse($userInfo);
    }
}
