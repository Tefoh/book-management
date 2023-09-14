<?php

namespace App\Interfaces\Repositories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AuthorRepositoryInterface
{
    public function getAllAuthors(): Collection;
    public function getPaginatedAuthors(): LengthAwarePaginator;
    public function getAuthorById($authorId): Author;
    public function deleteAuthor($authorId): bool;
    public function createAuthor(array $authorData): Author;
    public function updateAuthor($authorId, array $newData): Author;

    public function getAllAuthorsWithBooks(): Collection;
    public function getPaginatedAuthorsWithBooks(): LengthAwarePaginator;
    public function getAuthorByIdWithBooks($authorId): Author;
    public function createAuthorWithBooks(array $authorData): Author;
    public function updateAuthorWithBooks($authorId, array $newData): Author;
}
