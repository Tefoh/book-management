<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\Reserve\AndroidReleaseResource;
use App\Http\Resources\v1\Book\Reserve\IPhoneReleaseResource;
use App\Http\Resources\v1\Book\Reserve\WebReserveResource;
use App\Interfaces\Responses\Book\ReserveResponseInterface;
use Browser;

class ReserveResourceFactory implements ReserveResponseInterface
{
    public function sendResponse(array $data)
    {
        if (Browser::isMac()) {
            return new IPhoneReleaseResource((object) $data);
        } else if (Browser::isAndroid()) {
            return new AndroidReleaseResource((object) $data);
        } else if (Browser::isDesktop()) {
            return new WebReserveResource((object) $data);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
