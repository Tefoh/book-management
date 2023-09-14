<?php

namespace App\Interfaces\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
    public function getAllBooks(): Collection;
    public function getPaginatedBooks($total = null): LengthAwarePaginator;
    public function getBookById($bookId): Book;
    public function deleteBook($bookId): bool;
    public function createBook(array $bookData): Book;
    public function updateBook($bookId, array $newData): Book;

    public function getAllBooksWithAuthors(): Collection;
    public function getPaginatedBooksWithAuthors($total = null): LengthAwarePaginator;
    public function getAuthorByIdWithAuthors($bookId): Book;
    public function createBookWithAuthors(array $bookDetails): Book;
    public function updateBookWithAuthors($bookId, array $newDetails): Book;
}
