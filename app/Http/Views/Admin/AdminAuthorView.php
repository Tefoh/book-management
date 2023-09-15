<?php

namespace App\Http\Views\Admin;

use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\View as ViewContract;

class AdminAuthorView implements AdminAuthorResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $authors): ViewContract
    {
        return View::make('admin.authors.index', [
            'authors' => $authors
        ]);
    }

    public function sendSingleResponse(Author $author)
    {
        return View::make('admin.authors.show', [
            'author' => $author
        ]);
    }
}
