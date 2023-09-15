<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\AllBooks\AndroidAllBooksView;
use App\Http\Views\Book\AllBooks\IPhoneAllBooksView;
use App\Http\Views\Book\AllBooks\WebAllBooksView;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use Illuminate\Database\Eloquent\Collection;
use Browser;

class AllBookViewFactory implements AllBooksResponseInterface
{
    public function sendResponse(Collection $booksInfo)
    {
        if (Browser::isMac()) {
            return app(IPhoneAllBooksView::class)->render($booksInfo);
        } else if (Browser::isAndroid()) {
            return app(AndroidAllBooksView::class)->render($booksInfo);
        } else if (Browser::isDesktop()) {
            return app(WebAllBooksView::class)->render($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
