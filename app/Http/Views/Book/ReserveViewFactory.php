<?php

namespace App\Http\Views\Book;

use App\Exceptions\Exceptions\UnknownDeviceException;
use App\Http\Views\Book\Reserve\AndroidReserveView;
use App\Http\Views\Book\Reserve\IPhoneReserveView;
use App\Http\Views\Book\Reserve\WebReserveView;
use App\Interfaces\Responses\Book\ReserveResponseInterface;
use Browser;

class ReserveViewFactory implements ReserveResponseInterface
{
    public function sendResponse(array $data)
    {
        if (Browser::isMac()) {
            return app(IPhoneReserveView::class)->render($data);
        } else if (Browser::isAndroid()) {
            return app(AndroidReserveView::class)->render($data);
        } else if (Browser::isDesktop()) {
            return app(WebReserveView::class)->render($data);
        } else {
            throw new UnknownDeviceException();
        }
    }
}
