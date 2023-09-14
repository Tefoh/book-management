<?php

namespace App\Http\Resources\v1;

use App\Interfaces\Responses\Auth\LoginResponseInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource implements LoginResponseInterface
{
    private array $data;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => new BaseUserResource($this->data['user']),
            'token' => $this->data['token']
        ];
    }

    public function sendResponse(array $userInfo)
    {
        $this->data = $userInfo;

        return $this->toArray(
            \request()
        );
    }
}
