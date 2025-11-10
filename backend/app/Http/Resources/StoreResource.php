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
            'address' => $this->address,
            'phone' => $this->phone,
            'responsible' => $this->responsible,
            'category' => $this->category,
            'image_url' => $this->image_url,
            'location' => [
                'latitude' => (float) $this->latitude,
                'longitude' => (float) $this->longitude,
            ],
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}