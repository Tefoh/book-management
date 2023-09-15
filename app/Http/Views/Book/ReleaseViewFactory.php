<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\Release\AndroidReleaseView;
use App\Http\Views\Book\Release\IPhoneReleaseView;
use App\Http\Views\Book\Release\WebReleaseView;
use App\Interfaces\Responses\Book\ReleaseResponseInterface;
use Browser;

class ReleaseViewFactory implements ReleaseResponseInterface
{
    public function sendResponse(array $data)
    {
        if (Browser::isMac()) {
            return app(IPhoneReleaseView::class)->render($data);
        } else if (Browser::isAndroid()) {
            return app(AndroidReleaseView::class)->render($data);
        } else if (Browser::isDesktop()) {
            return app(WebReleaseView::class)->render($data);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
