<?php

namespace App\Interfaces\Handlers\Book;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface BookHandlerInterface
{
    public function getAllBooks(): Collection;

    public function getBook($id): Builder|Book|null;
}
