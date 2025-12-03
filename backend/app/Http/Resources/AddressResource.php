<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'street' => $this->street,
            'zip_code' => $this->zip_code,
            'number' => $this->number,
            'complement' => $this->complement,
            'landmark' => $this->landmark,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
        ];
    }
}
