<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository implements BookRepositoryInterface
{

    public function getAllBooks(): Collection
    {
        return Book::query()->get();
    }

    public function getPaginatedBooks($total = null): LengthAwarePaginator
    {
        return Book::query()->paginate($total);
    }

    public function getBookByIdBuilder($bookId): Builder
    {
        return Book::query()
            ->where('id', $bookId);
    }

    public function getBookById($bookId): Builder|Book|null
    {
        return $this
            ->getBookByIdBuilder($bookId)
            ->first();
    }

    public function deleteBook($bookId): bool
    {
        return $this
            ->getBookByIdBuilder($bookId)
            ->delete();
    }

    public function createBook(array $bookData): Builder|Book
    {
        return Book::query()->create($bookData);
    }

    public function updateBook($bookId, array $newData): Book
    {
        /**
         *  This will result two queries but with this approach
         *  the eloquent update event will trigger.
         */
        return tap(
            $this->getBookByIdBuilder($bookId)
                ->first()
        )
            ->update($newData);
    }

    public function getAllBooksWithAuthors(): Collection
    {
        return $this->getAllBooks()->load('authors');
    }

    public function getPaginatedBooksWithAuthors($total = null): LengthAwarePaginator
    {
        return tap(
            $this->getPaginatedBooks($total)
        )->load('authors');
    }

    public function getBookByIdWithAuthors($bookId): Book
    {
        return $this
            ->getBookById($bookId)
            ->load('authors');
    }

    public function createBookWithAuthors(array $bookData): Book
    {
        return $this->createBook($bookData)->load('authors');
    }

    public function updateBookWithAuthors($bookId, array $newData): Book
    {
        return $this->updateBook($bookId, $newData)->load('authors');
    }
}
