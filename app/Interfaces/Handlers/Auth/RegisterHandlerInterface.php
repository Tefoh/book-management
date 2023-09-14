<?php

namespace App\Interfaces\Handlers\Auth;

interface RegisterHandlerInterface
{
    public function register(array $userData): array;
}
