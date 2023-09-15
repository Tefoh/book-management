<?php

namespace App\Http\Resources\v1\Admin;

use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminAuthorResourceFactory implements AdminAuthorResponseInterface
{
    public function sendPaginatedResponse(LengthAwarePaginator $authors)
    {
        return AdminAuthorResource::collection($authors);
    }

    public function sendSingleResponse(Author $author)
    {
        return new AdminAuthorResource($author);
    }
}
