<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Avaliacao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');

        // --------------------
        // USUÁRIOS
        // --------------------
        $usuarios = [];
        for ($i = 0; $i < 5; $i++) {
            $usuarios[] = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123123123'),
                'type' => 'pf',
                'cpf' => $faker->numerify('###########'), // 11 dígitos
                'birth_date' => $faker->date('Y-m-d', '2003-01-01'),
                'gender' => $faker->randomElement(['masculino', 'feminino']),
                'cnpj' => null,
                'fantasy_name' => null,
                'state_registration' => null,
                'contact_name' => null,
                'contact_cpf' => null,
                'phone' => $faker->numerify('11#########'),
                'phone_secondary' => $faker->numerify('11#########'),
                'zip_code' => $faker->postcode,
                'address' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'complement' => $faker->secondaryAddress,
                'district' => $faker->citySuffix,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'reference' => $faker->sentence(3),
                'role' => 'user',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --------------------
        // EMPRESAS / LOJAS
        // --------------------
        $empresas = [];
        for ($i = 0; $i < 3; $i++) {
            $empresas[] = User::create([
                'name' => "Loja " . $faker->company,
                'email' => $faker->unique()->companyEmail,
                'password' => bcrypt('123123123'),
                'type' => 'pj',
                'cpf' => null,
                'birth_date' => null,
                'gender' => null,
                'cnpj' => $faker->numerify('##############'), // 14 dígitos
                'fantasy_name' => $faker->company,
                'state_registration' => $faker->numerify('###########'),
                'contact_name' => $faker->name,
                'contact_cpf' => $faker->numerify('###########'),
                'phone' => $faker->numerify('11#########'),
                'phone_secondary' => $faker->numerify('11#########'),
                'zip_code' => $faker->postcode,
                'address' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'complement' => $faker->secondaryAddress,
                'district' => $faker->citySuffix,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'reference' => $faker->sentence(3),
                'role' => 'store',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --------------------
        // PRODUTOS
        // --------------------
        $nomesProdutos = [
            'Smartphone Galaxy S23',
            'iPhone 15 Pro',
            'Smart TV 50"',
            'Smart TV 65"',
            'Caixa de Som Bluetooth',
            'Fone de Ouvido Sem Fio',
            'Headset Gamer',
            'Power Bank 20000mAh',
            'Câmera de Segurança Wi-Fi',
            'Echo Dot Alexa',
            'Notebook Dell i5',
            'Notebook Gamer Ryzen 7',
            'Mouse Gamer RGB',
            'Teclado Mecânico',
            'Monitor 27" Full HD',
            'SSD 1TB NVMe',
            'HD Externo 2TB',
            'Placa de Vídeo RTX 4060',
            'Fonte 750W Modular',
            'Processador Ryzen 9'
        ];

        $categorias = ['Eletrônicos', 'Informática', 'Moda', 'Casa', 'Esporte', 'Automotivo'];

        foreach ($empresas as $empresa) {
            for ($i = 0; $i < 20; $i++) {
                Product::create([
                    'user_id' => $empresa->id,
                    'name' => $faker->randomElement($nomesProdutos),
                    'description' => $faker->paragraph(),
                    'price' => $faker->randomFloat(2, 50, 5000),
                    'quantity_available' => $faker->numberBetween(0, 100),
                    'weight' => $faker->numberBetween(1, 5000),
                    'brand' => $faker->company,
                    'usage' => $faker->sentence(),
                    'category' => $faker->randomElement($categorias),
                    'sku' => strtoupper($faker->bothify('SKU-#####')),
                    'is_available' => $faker->boolean(85),
                ]);
            }
        }

        // --------------------
        // AVALIAÇÕES
        // --------------------
        $comentarios = [
            'Ótima loja, atendimento excelente e produtos de qualidade.',
            'Produto chegou rápido e em perfeito estado.',
            'Recomendo, experiência de compra muito boa.',
            'Atendimento ruim, demorou para responder minhas dúvidas.',
            'Produto diferente do anunciado, fiquei insatisfeito.',
            'Entrega dentro do prazo e muito bem embalado.',
            'Excelente loja, preço justo e suporte eficiente.',
            'Não gostei do produto, veio com defeito.',
            'Loja confiável, voltarei a comprar com certeza.',
            'Muito satisfeito, recomendo para todos os amigos.',
        ];
        foreach ($usuarios as $usuario) {
            foreach ($empresas as $empresa) {
                Avaliacao::create([
                    'user_id' => $usuario->id,
                    'store_id' => $empresa->id,
                    'nota' => $faker->numberBetween(3, 5),
                    'content' => $faker->randomElement($comentarios),
                ]);
            }
        }
    }
}
