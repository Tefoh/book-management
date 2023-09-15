<?php

namespace App\Http\Views\Admin;

use App\Interfaces\Responses\Admin\AdminBookResponseInterface;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\View as ViewContract;

class AdminBookView implements AdminBookResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $books): ViewContract
    {
        return View::make('admin.books.index', [
            'books' => $books
        ]);
    }

    public function sendSingleResponse(Book $book)
    {
        return View::make('admin.books.show', [
            'book' => $book
        ]);
    }
}
