<?php

namespace App\Interfaces\Responses\Admin;

use Illuminate\Pagination\LengthAwarePaginator;

interface AdminBookResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $books);
}
