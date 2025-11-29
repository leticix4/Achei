<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Store::create([
            'name' => 'Loja Central',
            'address' => 'Rua Principal, 123, Centro',
            'phone' => '1234567890',
            'responsible' => 'João Silva',
            'category' => 'Eletrônicos',
            'image_url' => null,
            'latitude' => -23.550520,
            'longitude' => -46.633308,
            'is_active' => true,
        ]);

        Store::create([
            'name' => 'Loja Leste',
            'address' => 'Av. Leste, 456, Bairro Leste',
            'phone' => '0987654321',
            'responsible' => 'Maria Souza',
            'category' => 'Roupas',
            'image_url' => null,
            'latitude' => -23.540000,
            'longitude' => -46.620000,
            'is_active' => true,
        ]);

        $stores = Store::all();

        foreach ($stores as $store) {
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'store_id' => $store->id,
                    'name' => "Produto $i da {$store->name}",
                    'description' => "Descrição do produto $i da {$store->name}",
                    'image_url' => null,
                    'price' => rand(10, 100) + rand(0, 99) / 100,
                    'quantity_available' => rand(5, 50),
                    'brand' => "Marca $i",
                    'category' => "Categoria $i",
                    'sku' => strtoupper(uniqid("SKU{$i}_")),
                    'is_available' => true,
                ]);
            }
        }
    }
}
