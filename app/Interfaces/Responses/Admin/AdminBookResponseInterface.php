<?php

namespace App\Interfaces\Responses\Admin;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminBookResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $books);

    public function sendSingleResponse(Book $book);
}
