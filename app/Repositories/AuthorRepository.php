<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorRepository implements AuthorRepositoryInterface
{

    public function getAllAuthors(): Collection
    {
        return Author::query()->get();
    }

    public function getPaginatedAuthors($total = null): LengthAwarePaginator
    {
        return Author::query()->paginate($total);
    }

    public function getAuthorByIdBuilder($authorId): Builder
    {
        return Author::query()
            ->where('id', $authorId);
    }

    public function getAuthorById($authorId): Builder|Author|null
    {
        return $this
            ->getAuthorByIdBuilder($authorId)
            ->first();
    }

    public function deleteAuthor($authorId): bool
    {
        return $this
            ->getAuthorByIdBuilder($authorId)
            ->delete();
    }

    public function createAuthor(array $authorData): Builder|Author
    {
        return Author::query()->create($authorData);
    }

    public function updateAuthor($authorId, array $newData): Author
    {
        /**
         *  This will result two queries but with this approach
         *  the eloquent update event will trigger.
         */
        return tap(
                $this->getAuthorByIdBuilder($authorId)
                    ->first()
            )
            ->update($newData);
    }

    public function getAllAuthorsWithBooks(): Collection
    {
        return $this->getAllAuthors()->load('books');
    }

    public function getPaginatedAuthorsWithBooks($total = null): LengthAwarePaginator
    {
        return tap(
            $this->getPaginatedAuthors($total)
        )->load('books');
    }

    public function getAuthorByIdWithBooks($authorId): Author
    {
        return $this
            ->getAuthorById($authorId)
            ->load('books');
    }

    public function createAuthorWithBooks(array $authorData): Author
    {
        return $this->createAuthor($authorData)->load('books');
    }

    public function updateAuthorWithBooks($authorId, array $newData): Author
    {
        return $this->updateAuthor($authorId, $newData)->load('books');
    }
}
