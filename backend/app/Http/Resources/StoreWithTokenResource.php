<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreWithTokenResource extends JsonResource
{
    public function toArray($request)
    {
        $user = $this->resource->user;
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'store' => StoreResource::make($this->resource),
            'user' => UserResource::make($user),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];
    }
}
