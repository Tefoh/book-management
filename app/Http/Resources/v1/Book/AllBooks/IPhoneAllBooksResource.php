<?php

namespace App\Http\Resources\v1\Book\AllBooks;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IPhoneAllBooksResource extends JsonResource
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
            'authors' => $this->authors->map(fn ($author) => [
                'id' => $author->id,
                'name' => $author->name,
            ])
        ];
    }
}
