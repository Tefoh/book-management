<?php

namespace App\Http\Controllers\v1\Auth;

use App\Interfaces\Handlers\Auth\LoginHandlerInterface;
use App\Interfaces\Requests\Auth\LoginRequestInterface;
use App\Interfaces\Responses\Auth\LoginResponseInterface;

class LoginController
{
    public function __construct(
        private readonly LoginHandlerInterface $loginHandler,
        private readonly LoginResponseInterface $loginResponse
    )
    { }

    public function __invoke(LoginRequestInterface $request)
    {
        $userInfo = $this->loginHandler->login(
            $request->validated()
        );

        abort_if(! optional($userInfo)['user'], 404, 'Credentials is invalid!');

        return $this->loginResponse->sendResponse($userInfo);
    }
}
