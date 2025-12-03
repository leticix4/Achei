<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $address = Address::create([
            'street' => 'Rua Exemplo',
            'number' => '123',
            'neighborhood' => 'Bairro Exemplo',
            'city' => 'Cidade Exemplo',
            'state' => 'EX',
            'zip_code' => '12345-678',
            'complement' => 'Apto 101',
        ]);

        $admin = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'cpf' => '119.166.123-02',
            'birth_date' => '1990-01-01',
            'phone' => '(11) 91234-5678',
            'role' => 'admin',
            'address_id' => $address->id,
        ]);

        $storeResponsible = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'cpf' => '119.166.123-02',
            'birth_date' => '1990-01-01',
            'phone' => '(11) 91234-5678',
            'role' => 'admin',
            'address_id' => $address->id,
        ]);

        $store =



        // $stores = Store::all();

        // foreach ($stores as $store) {
        //     for ($i = 1; $i <= 5; $i++) {
        //         Product::create([
        //             'store_id' => $store->id,
        //             'name' => "Produto $i da {$store->name}",
        //             'description' => "Descrição do produto $i da {$store->name}",
        //             'image_url' => null,
        //             'price' => rand(10, 100) + rand(0, 99) / 100,
        //             'quantity_available' => rand(5, 50),
        //             'brand' => "Marca $i",
        //             'category' => "Categoria $i",
        //             'sku' => strtoupper(uniqid("SKU{$i}_")),
        //             'is_available' => true,
        //         ]);
        //     }
        // }
    }
}
