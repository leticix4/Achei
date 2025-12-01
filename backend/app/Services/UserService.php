<?php

namespace App\Services;

use App\Models\User;
use App\Models\Address;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

    public function getUserByCredentials(array $data): User
    {
        $user = User::where('email', $data['email'])->firstOrFail();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorretas.'],
            ]);
        }

        return $user;
    }
}
