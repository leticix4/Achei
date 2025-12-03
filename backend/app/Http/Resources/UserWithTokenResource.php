<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class UserWithTokenResource extends JsonResource
{
    public function toArray($request)
    {
        $token = $this->createToken('auth_token')->plainTextToken;

        Cache::put('user_token_' . $this->id, $token, 525600); // 1 ano em minutos

        return [
            'user' => UserResource::make($this->resource),
            'token' => $token,
            'token_type' => 'Bearer'
        ];
    }
}
