<?php

namespace App\Http\Resources\v1\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminBookResource extends JsonResource
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
            'published_at' => $this->published_at?->toDateString(),
            'version' => $this->version,
            'can_be_reserved' => $this->canBeReserved(),
            'authors' => AdminAuthorResource::collection($this->authors),
        ];
    }
}
