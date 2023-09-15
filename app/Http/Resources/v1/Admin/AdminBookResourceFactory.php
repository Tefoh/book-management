<?php

namespace App\Http\Resources\v1\Admin;

use App\Interfaces\Responses\Admin\AdminBookResponseInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Book;

class AdminBookResourceFactory implements AdminBookResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $books)
    {
        return AdminBookResource::collection($books);
    }

    public function sendSingleResponse(Book $book)
    {
        return new AdminBookResource($book);
    }
}
