<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\Books\AndroidBooksResource;
use App\Http\Resources\v1\Book\Books\IPhoneBooksResource;
use App\Http\Resources\v1\Book\Books\WebBooksResource;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;
use App\Models\Book;
use Browser;

class SingleBookResourceFactory implements SingleBookResponseInterface
{
    public function sendResponse(Book $booksInfo)
    {
        if (Browser::isMac()) {
            return new IPhoneBooksResource($booksInfo);
        } else if (Browser::isAndroid()) {
            return new AndroidBooksResource($booksInfo);
        } else if (Browser::isDesktop()) {
            return new WebBooksResource($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
