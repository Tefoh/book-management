<?php

namespace App\Http\Resources\v1\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Resources\v1\Book\Release\AndroidReleaseResource;
use App\Http\Resources\v1\Book\Release\IPhoneReleaseResource;
use App\Http\Resources\v1\Book\Release\WebReleaseResource;
use App\Interfaces\Responses\Book\ReleaseResponseInterface;
use Browser;

class ReleaseResourceFactory implements ReleaseResponseInterface
{
    public function sendResponse(array $data)
    {
        if (Browser::isMac()) {
            return new IPhoneReleaseResource((object) $data);
        } else if (Browser::isAndroid()) {
            return new AndroidReleaseResource((object) $data);
        } else if (Browser::isDesktop()) {
            return new WebReleaseResource((object) $data);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
