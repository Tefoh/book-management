<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookHandler implements BookHandlerInterface
{
    public function __construct(
        private readonly BookRepositoryInterface $bookRepository
    )
    { }

    public function getAllBooks(): Collection
    {
        return $this
            ->bookRepository
            ->getAllBooksWithAuthors();
    }
}
