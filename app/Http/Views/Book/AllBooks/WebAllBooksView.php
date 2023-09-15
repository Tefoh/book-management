<?php

namespace App\Http\Views\Book\AllBooks;

use App\Http\Views\ViewInterface;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;

class WebAllBooksView implements ViewInterface
{
    public function render($data): ViewContract
    {
        /** @var Collection $data */
        $books = $data->map(fn ($book) => [
            'id' => $book->id,
            'title' => $book->title,
            'version' => $book->version,
            'authors' => $book->authors->pluck('name')
        ]);

        return View::make('books.all', [
            'books' => $books
        ]);
    }
}
