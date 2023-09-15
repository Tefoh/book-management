<?php

namespace App\Interfaces\Handlers\Book;

use Illuminate\Database\Eloquent\Collection;

interface BookHandlerInterface
{
    public function getAllBooks(): Collection;
}
