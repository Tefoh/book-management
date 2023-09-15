<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\AllBooks\AndroidAllBooksResource;
use App\Http\Resources\v1\Book\AllBooks\IPhoneAllBooksResource;
use App\Http\Resources\v1\Book\AllBooks\WebAllBooksResource;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;
use App\Models\Book;
use Browser;

class SingleBookResourceFactory implements SingleBookResponseInterface
{
    public function sendResponse(Book $booksInfo)
    {
        if (Browser::isMac()) {
            return new IPhoneAllBooksResource($booksInfo);
        } else if (Browser::isAndroid()) {
            return new AndroidAllBooksResource($booksInfo);
        } else if (Browser::isDesktop()) {
            return new WebAllBooksResource($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
