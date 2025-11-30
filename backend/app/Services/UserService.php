<?php

namespace App\Services;

use App\Models\User;
use App\Models\Address;
use App\Enums\UserRoleEnum;


class UserService
{
    public function __construct() {}

    public function create(array $data): User
    {
        $address = Address::create($data['address']);

        $data['address_id'] = $address->id;
        $data['role'] = UserRoleEnum::CUSTOMER->value;
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }
}
