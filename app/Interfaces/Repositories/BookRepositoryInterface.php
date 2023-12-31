<?php

namespace App\Interfaces\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
    public function getAllBooks($columns = ['*']): Collection;
    public function getPaginatedBooks($total = null): LengthAwarePaginator;
    public function getBookById($bookId): Builder|Book|null;
    public function deleteBook($bookId): bool;
    public function createBook(array $bookData): Builder|Book;
    public function updateBook($bookId, array $newData): Book;

    public function getAllBooksWithAuthors($columns = ['*']): Collection;
    public function getPaginatedBooksWithAuthors($total = null): LengthAwarePaginator;
    public function getBookByIdWithAuthors($bookId): Builder|Book|null;
    public function createBookWithAuthors(array $bookData): Builder|Book;
    public function updateBookWithAuthors($bookId, array $newData): Book;

    public function assignAuthors(Book $book, array $authorIds);
}
