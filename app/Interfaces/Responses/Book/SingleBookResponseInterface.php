<?php

namespace App\Interfaces\Responses\Book;

use App\Models\Book;

interface SingleBookResponseInterface
{
    public function sendResponse(Book $booksInfo);
}
