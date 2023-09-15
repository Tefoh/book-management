<?php

namespace App\Http\Controllers\v1\Book;

use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;

class BookController
{
    public function __construct(
        private readonly BookHandlerInterface $bookHandler,
        private readonly AllBooksResponseInterface $allBooksResponse,
        private readonly SingleBookResponseInterface $singleBookResponse,
    )
    { }

    public function allBooks()
    {
        $books = $this->bookHandler->getAllBooks();

        return $this->allBooksResponse->sendResponse($books);
    }

    public function getBook($id)
    {
        $book = $this->bookHandler->getBook($id);

        abort_if(! $book, 404, 'Book does not exists!');

        return $this->singleBookResponse->sendResponse($book);
    }
}
