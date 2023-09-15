<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\Books\AndroidBooksResource;
use App\Http\Resources\v1\Book\Books\IPhoneBooksResource;
use App\Http\Resources\v1\Book\Books\WebBooksResource;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use Browser;
use Illuminate\Database\Eloquent\Collection;

class AllBooksResourceFactory implements AllBooksResponseInterface
{
    public function sendResponse(Collection $booksInfo)
    {
        if (Browser::isMac()) {
            return IPhoneBooksResource::collection($booksInfo);
        } else if (Browser::isAndroid()) {
            return AndroidBooksResource::collection($booksInfo);
        } else if (Browser::isDesktop()) {
            return WebBooksResource::collection($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
