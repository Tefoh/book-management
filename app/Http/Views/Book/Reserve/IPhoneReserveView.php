<?php

namespace App\Http\Views\Book\Reserve;

use App\Http\Views\ViewInterface;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;

class IPhoneReserveView implements ViewInterface
{
    public function render($data): ViewContract
    {
        return View::make('books.reserved.iphone')
            ->with([
                'message' => $data['message']
            ]);
    }

    public function renderOne($data): ViewContract
    {
        return View::make('books.reserved.iphone')
            ->with([
                'message' => $data['message']
            ]);
    }
}
