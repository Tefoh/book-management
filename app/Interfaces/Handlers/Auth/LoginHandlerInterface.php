<?php

namespace App\Interfaces\Handlers\Auth;

interface LoginHandlerInterface
{
    public function login(array $userData): array|null;
}
