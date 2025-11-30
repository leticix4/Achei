<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'trade_name' => $this->trade_name,
            'state_registration' => $this->state_registration,
            'cnpj' => $this->cnpj,
            'phone' => $this->phone,
            'additional_phone' => $this->additional_phone,
            'latitude' => (float) $this->latitude,
            'longitude' => (float) $this->longitude,
            'is_active' => $this->is_active,
            'category' => $this->category,
            'image_url' => $this->image_url
        ];
    }
}
