<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de Lojas com Endereços Reais de Almenara-MG
        $lojasReais = [
            [
                'name' => 'Tech World Eletrônicos',
                'category' => 'Eletrônicos',
                'address' => 'Rua Tiradentes, 318 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Moda Fashion Center',
                'category' => 'Roupas',
                'address' => 'Rua Alvimar Lopes dos Santos, 18 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Supermercado do Bairro',
                'category' => 'Mercado',
                'address' => 'Av. Olindo de Miranda, 1010 - São Pedro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Livraria Cultura Viva',
                'category' => 'Livros',
                'address' => 'Rua Floriano Peixoto, 18 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Esportes Radicais',
                'category' => 'Esporte',
                'address' => 'Rua Araçuaí, 11 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Casa & Conforto',
                'category' => 'Casa',
                'address' => 'Rua Cândido Mares, 601 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Brinquedos Mágicos',
                'category' => 'Brinquedos',
                'address' => 'Rua Henrique Heitman, 211 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Sapataria Elegance',
                'category' => 'Calçados',
                'address' => 'Rua Capitão Marcelino, 148 - Centro, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Pet Shop Amigo Fiel',
                'category' => 'Animais',
                'address' => 'Rua Benjamin Alves dos Santos, 553 - Cidade Verde, Almenara - MG, 39900-000',
            ],
            [
                'name' => 'Gamer Zone',
                'category' => 'Eletrônicos',
                'address' => 'Rua Aleixo Paraguassu, 196 - Centro, Almenara - MG, 39900-000',
            ]
        ];

        foreach ($lojasReais as $dadosLoja) {
            
            // Cria a loja com os dados reais
            $loja = Store::factory()->create([
                'name' => $dadosLoja['name'],
                'address' => $dadosLoja['address'], 
                // Se você tiver colunas de latitude/longitude, podemos adicionar aqui também
            ]);

            // Cria produtos para essa loja usando a categoria correta
            Product::factory(30)->create([
                'store_id' => $loja->id,
                'category' => $dadosLoja['category'],
            ]);
        }
    }
}