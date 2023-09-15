<?php

namespace App\Http\Controllers\v1\Book;

use App\Interfaces\Handlers\Book\ReserveHandlerInterface;
use App\Interfaces\Responses\Book\ReleaseResponseInterface;
use App\Interfaces\Responses\Book\ReserveResponseInterface;
use Illuminate\Http\Request;

class ReserveController
{
    public function __construct(
        private readonly ReserveHandlerInterface $reserveHandler,
        private readonly ReserveResponseInterface $reserveResponse,
        private readonly ReleaseResponseInterface $releaseResponse,
    )
    { }

    public function reserve(Request $request, $bookId)
    {
        $reserveData = $this->reserveHandler->reserveBook(
            $bookId,
            $request->user() ?? auth()->user()
        );

        return $this->reserveResponse->sendResponse($reserveData);
    }

    public function release($bookId)
    {
        $releaseData = $this->reserveHandler->releaseBook(
            $bookId
        );

        return $this->releaseResponse->sendResponse($releaseData);
    }
}
