<?php

namespace App\Handlers;

use App\Interfaces\Handlers\Admin\AdminAuthorHandlerInterface;
use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminAuthorHandler implements AdminAuthorHandlerInterface
{
    public function __construct(
        private readonly AuthorRepositoryInterface    $authorRepository
    )
    { }

    public function getPaginatedAuthors(): LengthAwarePaginator
    {
        return $this->authorRepository->getPaginatedAuthors();
    }

    public function createAuthorWithBooks(array $data): Author
    {
        return $this->authorRepository->createAuthorWithBooks(
            $data
        );
    }

    public function updateAuthorWithBooks(Author $author, array $data)
    {
        return $this->authorRepository->updateAuthorWithBooks(
            $author->id,
            $data
        );
    }

    public function deleteAuthor(int $id)
    {
        return $this->authorRepository->deleteAuthor(
            $id
        );
    }
}
