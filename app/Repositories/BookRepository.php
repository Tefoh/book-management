<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository implements BookRepositoryInterface
{

    public function getAllBooks(): Collection
    {
        // TODO: Implement getAllBooks() method.
    }

    public function getPaginatedBooks(): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedBooks() method.
    }

    public function getBookById($authorId): Book
    {
        // TODO: Implement getBookById() method.
    }

    public function deleteBook($authorId): bool
    {
        // TODO: Implement deleteBook() method.
    }

    public function createBook(array $authorData): Book
    {
        // TODO: Implement createBook() method.
    }

    public function updateBook($authorId, array $newData): Book
    {
        // TODO: Implement updateBook() method.
    }

    public function getAllBooksWithAuthors(): Collection
    {
        // TODO: Implement getAllBooksWithAuthors() method.
    }

    public function getPaginatedBooksWithAuthors(): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedBooksWithAuthors() method.
    }

    public function getAuthorByIdWithAuthors($authorId): Book
    {
        // TODO: Implement getAuthorByIdWithAuthors() method.
    }

    public function createBookWithAuthors(array $authorDetails): Book
    {
        // TODO: Implement createBookWithAuthors() method.
    }

    public function updateBookWithAuthors($authorId, array $newDetails): Book
    {
        // TODO: Implement updateBookWithAuthors() method.
    }
}
