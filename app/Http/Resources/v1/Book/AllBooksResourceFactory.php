<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\AllBooks\AndroidAllBooksResource;
use App\Http\Resources\v1\Book\AllBooks\IPhoneAllBooksResource;
use App\Http\Resources\v1\Book\AllBooks\WebAllBooksResource;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use Browser;
use Illuminate\Database\Eloquent\Collection;

class AllBooksResourceFactory implements AllBooksResponseInterface
{
    public function sendResponse(Collection $booksInfo)
    {
        if (Browser::isMac()) {
            return IPhoneAllBooksResource::collection($booksInfo);
        } else if (Browser::isAndroid()) {
            return AndroidAllBooksResource::collection($booksInfo);
        } else if (Browser::isDesktop()) {
            return WebAllBooksResource::collection($booksInfo);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
