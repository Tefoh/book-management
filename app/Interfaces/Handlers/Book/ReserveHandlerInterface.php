<?php

namespace App\Interfaces\Handlers\Book;

use App\Models\User;

interface ReserveHandlerInterface
{
    public function reserveBook($bookId, User $user): array;
    public function releaseBook($bookId): array;
}
