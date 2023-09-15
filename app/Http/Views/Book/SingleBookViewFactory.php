<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\Books\AndroidBooksView;
use App\Http\Views\Book\Books\IPhoneBooksView;
use App\Http\Views\Book\Books\WebBooksView;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;
use App\Models\Book;
use Browser;

class SingleBookViewFactory implements SingleBookResponseInterface
{
    public function sendResponse(Book $booksInfo)
    {
        if (Browser::isMac()) {
            return app(IPhoneBooksView::class)->renderOne($booksInfo);
        } else if (Browser::isAndroid()) {
            return app(AndroidBooksView::class)->renderOne($booksInfo);
        } else if (Browser::isDesktop()) {
            return app(WebBooksView::class)->renderOne($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
