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
        // TODO: Implement getAllBooks() method.
    }

    public function getPaginatedBooks($total = null): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedBooks() method.
    }

    public function getBookById($bookId): Builder|Book|null
    {
        // TODO: Implement getBookById() method.
    }

    public function deleteBook($bookId): bool
    {
        // TODO: Implement deleteBook() method.
    }

    public function createBook(array $bookData): Builder|Book
    {
        // TODO: Implement createBook() method.
    }

    public function updateBook($bookId, array $newData): Book
    {
        // TODO: Implement updateBook() method.
    }

    public function getAllBooksWithAuthors(): Collection
    {
        // TODO: Implement getAllBooksWithAuthors() method.
    }

    public function getPaginatedBooksWithAuthors($total = null): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedBooksWithAuthors() method.
    }

    public function getAuthorByIdWithAuthors($bookId): Builder|Book|null
    {
        // TODO: Implement getAuthorByIdWithAuthors() method.
    }

    public function createBookWithAuthors(array $bookData): Builder|Book
    {
        // TODO: Implement createBookWithAuthors() method.
    }

    public function updateBookWithAuthors($bookId, array $newData): Book
    {
        // TODO: Implement updateBookWithAuthors() method.
    }
}
