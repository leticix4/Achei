<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserWithTokenResource extends JsonResource
{
    public function toArray($request)
    {
        $token = $this->createToken('auth_token')->plainTextToken;
        return [
            'user' => UserResource::make($this->resource),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
    }
}
