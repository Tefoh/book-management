<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\Books\AndroidBooksView;
use App\Http\Views\Book\Books\IPhoneBooksView;
use App\Http\Views\Book\Books\WebBooksView;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use Illuminate\Database\Eloquent\Collection;
use Browser;

class AllBookViewFactory implements AllBooksResponseInterface
{
    public function sendResponse(Collection $booksInfo)
    {
        if (Browser::isMac()) {
            return app(IPhoneBooksView::class)->render($booksInfo);
        } else if (Browser::isAndroid()) {
            return app(AndroidBooksView::class)->render($booksInfo);
        } else if (Browser::isDesktop()) {
            return app(WebBooksView::class)->render($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
