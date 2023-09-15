<?php

namespace App\Http\Views\Book\Release;

use App\Http\Views\ViewInterface;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;

class IPhoneReleaseView implements ViewInterface
{
    public function render($data): ViewContract
    {
        return View::make('books.released.iphone')
            ->with([
                'message' => $data['message']
            ]);
    }

    public function renderOne($data): ViewContract
    {
        return View::make('books.released.iphone')
            ->with([
                'message' => $data['message']
            ]);
    }
}
