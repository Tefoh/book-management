<?php

namespace App\Http\Controllers\v1\Book;

use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;

class BookController
{
    public function __construct(
        private readonly BookHandlerInterface $bookHandler,
        private readonly AllBooksResponseInterface $allBooksResponse,
    )
    { }

    public function allBooks()
    {
        $books = $this->bookHandler->getAllBooks();

        return $this->allBooksResponse->sendResponse($books);
    }
}
