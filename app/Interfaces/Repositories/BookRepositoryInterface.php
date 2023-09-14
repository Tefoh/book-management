<?php

namespace App\Interfaces\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface
{
    public function getAllBooks(): Collection;
    public function getAllPaginatedBooks(): Collection;
    public function getBookById($bookId): Book;
    public function deleteBook($bookId): bool;
    public function createBook(array $bookData): Book;
    public function updateBook($bookId, array $newData): Book;

    public function getAllBooksWithAuthors(): Collection;
    public function getAllPaginatedBooksWithAuthors(): Collection;
    public function getAuthorByIdWithAuthors($bookId): Book;
    public function createBookWithAuthors(array $bookDetails): Book;
    public function updateBookWithAuthors($bookId, array $newDetails): Book;
}
