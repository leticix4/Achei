<?php

namespace App\Services;

use App\Enums\GenderEnum;
use App\Models\User;
use App\Models\Address;
use App\Enums\UserRoleEnum;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class StoreService
{
    public function __construct() {}

    public function create(array $data): Store
    {
        return DB::transaction(function () use ($data) {
            $data['role'] = UserRoleEnum::VENDOR->value;
            $data['gender'] = GenderEnum::OTHER->value;

            $address = Address::create($data['address']);
            $data['address_id'] = $address->id;

            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);

            $store = Store::create([
                'name' => $data['name'],
                'trade_name' => $data['trade_name'],
                'state_registration' => $data['state_registration'],
                'cnpj' => $data['cnpj'],
                'phone' => $data['phone'],
                'additional_phone' => $data['additional_phone'] ?? null,
                'latitude' => $data['latitude'] ?? -16.184,
                'longitude' => $data['longitude'] ?? -40.694,
                'is_active' => true,
                'address_id' => $address->id,
                'user_id' => $user->id,
                'category' => $data['category'],
                'image_url' => $data['image_url'] ?? null,
            ]);

            return $store;
        });
    }
}
