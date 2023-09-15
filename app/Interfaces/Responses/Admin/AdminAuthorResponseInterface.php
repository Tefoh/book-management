<?php

namespace App\Interfaces\Responses\Admin;

use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminAuthorResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $authors);

    public function sendSingleResponse(Author $author);
}
