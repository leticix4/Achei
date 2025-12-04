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

        User::create(
            [
                'name' => 'Leonardo Souza',
                'email' => 'user@email.com',
                'password' => bcrypt('123123123'),
                'type' => 'pf',

                'cpf' => '12345678901',
                'birth_date' => '1990-05-10',
                'gender' => 'masculino',

                'cnpj' => null,
                'fantasy_name' => null,
                'state_registration' => null,
                'contact_name' => null,
                'contact_cpf' => null,

                'phone' => '11999990000',
                'phone_secondary' => '1122223333',

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
            ]
        );

        $empresa = User::create(
            [
                'name' => 'LP Software House',
                'email' => 'empresa@email.com',
                'password' => bcrypt('123123123'),
                'type' => 'pj',

                'cpf' => null,
                'birth_date' => null,
                'gender' => null,

                'cnpj' => '11222333000199',
                'fantasy_name' => 'XPTO Comércio',
                'state_registration' => '123456789',
                'contact_name' => 'Maria Souza',
                'contact_cpf' => '98765432100',

                'phone' => '1133334444',
                'phone_secondary' => null,

                'zip_code' => '02020000',
                'address' => 'Avenida Industrial',
                'number' => '500',
                'complement' => null,
                'district' => 'Indústria',
                'city' => 'Osasco',
                'state' => 'SP',
                'reference' => 'Em frente à fábrica',

                'role' => 'store',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

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
            'Monitor UltraWide',
            'SSD 1TB NVMe',
            'HD Externo 2TB',
            'Placa de Vídeo RTX 4060',
            'Fonte 750W Modular',
            'Processador Ryzen 9',
            'Cooler RGB Watercooler',
            'Camiseta Masculina Básica',
            'Camiseta Feminina Premium',
            'Jaqueta Jeans',
            'Jaqueta Corta Vento',
            'Tênis Esportivo',
            'Tênis Casual',
            'Calça Jeans Slim',
            'Calça Moletom',
            'Boné Aba Curva',
            'Boné Snapback',
            'Relógio Masculino',
            'Relógio Feminino',
            'Óculos de Sol Polarizado',
            'Air Fryer 5L',
            'Liquidificador Turbo',
            'Batedeira Planetária',
            'Micro-ondas 30L',
            'Geladeira Inverse',
            'Fogão 5 Bocas',
            'Cafeteira Elétrica',
            'Panela Elétrica de Arroz',
            'Jogo de Panelas 10 Peças',
            'Aspirador de Pó Vertical',
            'Ventilador Turbo',
            'Ar-condicionado 12000 BTUs',
            'Bicicleta Aro 29',
            'Esteira Elétrica',
            'Bola de Futebol Oficial',
            'Bola de Basquete',
            'Kit Halteres 20kg',
            'Luvas de Treino',
            'Corda de Pular Profissional',
            'Tênis de Corrida',
            'Mochila Esportiva',
            'Garrafa Térmica 1L',
            'Central Multimídia 9"',
            'Câmera de Ré',
            'Sensor de Estacionamento',
            'Capa de Volante',
            'Tapete Automotivo',
            'Carregador Veicular Turbo',
            'Aspirador Automotivo',
            'Calha de Chuva',
            'Farol de Milha',
            'Suporte de Celular Veicular',
            'Mala de Viagem Grande',
            'Mochila Executiva',
            'Cadeira Gamer',
            'Cadeira de Escritório',
            'Mesa de Escritório',
            'Impressora Multifuncional',
            'Scanner Profissional',
            'Tablet 10"',
            'Kindle Paperwhite',
            'Smartwatch'
        ];

        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'user_id' => $empresa->id,
                'name' => fake()->randomElement($nomesProdutos),
                'description' => fake()->optional()->paragraph(),
                'price' => fake()->randomFloat(2, 10, 5000),
                'quantity_available' => fake()->numberBetween(0, 100),
                'brand' => fake()->company,
                'category' => fake()->randomElement([
                    'Eletrônicos',
                    'Informática',
                    'Moda',
                    'Casa',
                    'Esporte',
                    'Automotivo'
                ]),
                'sku' => strtoupper(fake()->bothify('SKU-#####')),
                'is_available' => fake()->boolean(85),
            ]);
        }
    }
}
