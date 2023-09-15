<?php

namespace App\Http\Resources\v1\Book\Release;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IPhoneReleaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'color' => $this->is_successful ? 'green' : 'red',
        ];
    }
}
