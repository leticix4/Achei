<?php

namespace Database\Seeders;

use App\Models\Avaliacao;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --------------------
        // USUÁRIO
        // --------------------
        $usuario = User::create([
            'name' => 'Usuário Teste',
            'email' => 'user@email.com',
            'password' => Hash::make('123123123'),
            'type' => 'pf',
            'cpf' => '12345678901',
            'birth_date' => '1990-01-01',
            'gender' => 'masculino',
            'phone' => '11999990000',
            'phone_secondary' => null,
            'zip_code' => '01001000',
            'address' => 'Rua Exemplo',
            'number' => '100',
            'complement' => 'Apto 10',
            'district' => 'Centro',
            'city' => 'São Paulo',
            'state' => 'SP',
            'reference' => 'Próximo à praça central',
            'role' => 'user',
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // --------------------
        // LOJA
        // --------------------
        $empresa = User::create([
            'name' => 'Loja Teste',
            'email' => 'empresa@email.com',
            'password' => Hash::make('123123123'),
            'type' => 'pj',
            'cnpj' => '11222333000199',
            'fantasy_name' => 'Loja Teste',
            'state_registration' => '123456789',
            'contact_name' => 'Maria Contato',
            'contact_cpf' => '98765432100',
            'phone' => '1133334444',
            'phone_secondary' => null,
            'zip_code' => '02020000',
            'address' => 'Avenida Comercial',
            'number' => '500',
            'district' => 'Centro',
            'city' => 'Osasco',
            'state' => 'SP',
            'reference' => 'Em frente ao shopping',
            'role' => 'store',
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // --------------------
        // PRODUTOS
        // --------------------
        $nomesProdutos = [
            'Smartphone Galaxy S23',
            'iPhone 15 Pro',
            'Smart TV 50"',
            'Caixa de Som Bluetooth',
            'Fone de Ouvido Sem Fio',
            'Headset Gamer'
        ];

        $categorias = ['Eletrônicos', 'Informática', 'Moda', 'Casa', 'Esporte', 'Automotivo'];

        $usos = ['Uso doméstico', 'Uso profissional', 'Uso escolar', 'Uso comercial'];

        foreach ($nomesProdutos as $index => $nomeProduto) {
            Product::create([
                'user_id' => $empresa->id,
                'name' => $nomeProduto,
                'description' => 'Descrição detalhada do produto ' . ($index + 1),
                'price' => 100 + $index * 50,
                'quantity_available' => 10 + $index,
                'weight' => 500 + $index * 100,
                'brand' => 'Marca ' . ($index + 1),
                'category' => $categorias[$index % count($categorias)],
                'sku' => 'SKU-' . ($index + 1000),
                'is_available' => true,
                'usage' => $usos[$index % count($usos)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --------------------
        // AVALIAÇÕES
        // --------------------
        $comentarios = [
            'Ótima loja, atendimento excelente e produtos de qualidade.',
            'Produto chegou rápido e em perfeito estado.',
            'Recomendo, experiência de compra muito boa.',
            'Entrega dentro do prazo e muito bem embalado.',
        ];

        foreach ($comentarios as $index => $comentario) {
            Avaliacao::create([
                'user_id' => $usuario->id,
                'store_id' => $empresa->id,
                'nota' => 3 + ($index % 3), // notas de 3 a 5
                'content' => $comentario,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
