<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'price' => (float) $this->price,
            'quantity_available' => $this->quantity_available,
            'brand' => $this->brand,
            'category' => $this->category,
            'sku' => $this->sku,
            'is_available' => $this->is_available,
            'store' => new StoreResource($this->whenLoaded('store')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}