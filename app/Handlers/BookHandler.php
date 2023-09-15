<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
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

    public function getBook($id): Builder|Book|null
    {
        return $this
            ->bookRepository
            ->getBookByIdWithAuthors($id);
    }
}
