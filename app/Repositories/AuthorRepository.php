<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorRepository implements AuthorRepositoryInterface
{

    public function getAllAuthors(): Collection
    {
        // TODO: Implement getAllAuthors() method.
    }

    public function getPaginatedAuthors(): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedAuthors() method.
    }

    public function getAuthorById($authorId): Author
    {
        // TODO: Implement getAuthorById() method.
    }

    public function deleteAuthor($authorId): bool
    {
        // TODO: Implement deleteAuthor() method.
    }

    public function createAuthor(array $authorData): Author
    {
        // TODO: Implement createAuthor() method.
    }

    public function updateAuthor($authorId, array $newData): Author
    {
        // TODO: Implement updateAuthor() method.
    }

    public function getAllAuthorsWithBooks(): Collection
    {
        // TODO: Implement getAllAuthorsWithBooks() method.
    }

    public function getPaginatedAuthorsWithBooks(): LengthAwarePaginator
    {
        // TODO: Implement getPaginatedAuthorsWithBooks() method.
    }

    public function getAuthorByIdWithBooks($authorId): Author
    {
        // TODO: Implement getAuthorByIdWithBooks() method.
    }

    public function createAuthorWithBooks(array $authorData): Author
    {
        // TODO: Implement createAuthorWithBooks() method.
    }

    public function updateAuthorWithBooks($authorId, array $newData): Author
    {
        // TODO: Implement updateAuthorWithBooks() method.
    }
}
