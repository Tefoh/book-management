<?php

namespace App\Http\Views\Book\Books;

use App\Http\Views\ViewInterface;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;

class WebBooksView implements ViewInterface
{
    public function render($data): ViewContract
    {
        /** @var Collection $data */
        $books = $data->map(fn ($book) => $this->mapBookData($book));

        return View::make('books.all', [
            'books' => $books
        ]);
    }

    public function renderOne($data): ViewContract
    {
        $bookData = $this->mapBookData($data);

        return View::make('books.show', [
            'book' => $bookData
        ]);
    }

    private function mapBookData($book)
    {
        return [
            'id' => $book->id,
            'title' => $book->title,
            'version' => $book->version,
            'authors' => $book->authors->pluck('name')
        ];
    }
}
