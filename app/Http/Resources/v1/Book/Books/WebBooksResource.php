<?php

namespace App\Http\Resources\v1\Book\Books;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebBooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'version' => $this->version,
            'authors' => $this->authors->pluck('name')
        ];
    }
}
