<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\AllBooks\AndroidAllBooksView;
use App\Http\Views\Book\AllBooks\IPhoneAllBooksView;
use App\Http\Views\Book\AllBooks\WebAllBooksView;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;
use App\Models\Book;
use Browser;

class SingleBookViewFactory implements SingleBookResponseInterface
{
    public function sendResponse(Book $booksInfo)
    {
        if (Browser::isMac()) {
            return app(IPhoneAllBooksView::class)->renderOne($booksInfo);
        } else if (Browser::isAndroid()) {
            return app(AndroidAllBooksView::class)->renderOne($booksInfo);
        } else if (Browser::isDesktop()) {
            return app(WebAllBooksView::class)->renderOne($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
