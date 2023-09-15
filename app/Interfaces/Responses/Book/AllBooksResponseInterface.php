<?php

namespace App\Interfaces\Responses\Book;

use Illuminate\Database\Eloquent\Collection;

interface AllBooksResponseInterface
{
    public function sendResponse(Collection $booksInfo);
}
