<?php

namespace App\Interfaces\Handlers\Admin;

use App\Models\Author;

interface AdminAuthorHandlerInterface
{
    public function getPaginatedAuthors();

    public function createAuthorWithBooks(array $data);

    public function updateAuthorWithBooks(Author $author, array $data);

    public function deleteAuthor(int $id);
}
