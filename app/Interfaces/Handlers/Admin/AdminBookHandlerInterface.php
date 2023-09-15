<?php

namespace App\Interfaces\Handlers\Admin;

use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminBookHandlerInterface
{
    public function getPaginatedBooks(): LengthAwarePaginator;
    public function createBookWithAuthors(array $data): Book;
    public function updateBookWithAuthors(Book $book, array $data);
    public function deleteBook(int $id);

    public function createBook(array $data);

    public function updateBook(Book $book, array $data);
}
