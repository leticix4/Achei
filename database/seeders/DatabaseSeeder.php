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

        $usages = [
            'Uso interno',
    'Uso externo',
    'Uso doméstico',
    'Uso profissional',
    'Uso industrial',
    'Uso medicinal',
    'Uso alimentício',
    'Uso cosmético',
    'Uso veterinário',
    'Uso agrícola',
    'Uso hospitalar',
    'Uso escolar',
    'Uso corporativo',
    'Uso residencial',
    'Uso comercial',
    
    // Frequência
    'Uso diário',
    'Uso semanal',
    'Uso mensal',
    'Uso conforme necessidade',
    'Uso contínuo',
    'Uso intermitente',
    'Uso sazonal',
    'Uso eventual',
    'Uso único',
    'Uso periódico',
    'Uso regular',
    'Aplicar uma vez ao dia',
    'Aplicar duas vezes ao dia',
    'Aplicar três vezes ao dia',
    'Aplicar a cada 6 horas',
    'Aplicar a cada 8 horas',
    'Aplicar a cada 12 horas',
    'Aplicar a cada 24 horas',
    'Aplicar em jejum',
    'Aplicar após as refeições',
    'Aplicar antes de dormir',
    
    // Dosagem/aplicação
    'Diluir em água',
    'Usar puro',
    'Aplicar uma camada fina',
    'Aplicar uma camada grossa',
    'Quantidade moderada',
    'Siga as instruções do fabricante',
    'Dosagem conforme peso',
    'Aplicar em pequena quantidade',
    'Aplicar abundantemente',
    'Dissolver completamente',
    'Misturar bem antes de usar',
    'Aplicar uniformemente',
    'Uso tópico',
    'Uso oral',
    'Aplicação cutânea',
    'Inalação',
    'Injeção intramuscular',
    
    // Instruções de preparo
    'Agitar antes de usar',
    'Misturar bem',
    'Dissolver em água morna',
    'Diluir conforme indicado',
    'Preparar na hora do uso',
    'Não diluir',
    'Manter refrigerado após aberto',
    'Conservar em geladeira',
    'Não congelar',
    'Manter em temperatura ambiente',
    
    // Local de aplicação
    'Aplicar na área afetada',
    'Aplicar no rosto',
    'Aplicar no corpo',
    'Aplicar nos cabelos',
    'Aplicar nas mãos',
    'Aplicar nos pés',
    'Aplicar nas unhas',
    'Aplicar na pele',
    'Aplicar nas mucosas',
    'Aplicar sobre a ferida',
    'Aplicar em toda a superfície',
    'Aplicar em pontos específicos',
    
    // Cuidados/Precauções
    'Manter em local seco',
    'Aplicar em superfície limpa',
    'Evitar contato com os olhos',
    'Lavar as mãos após o uso',
    'Não ingerir',
    'Manter fora do alcance de crianças',
    'Armazenar em temperatura ambiente',
    'Evitar exposição ao sol',
    'Não usar em pele lesionada',
    'Testar em pequena área primeiro',
    'Evitar contato com roupas',
    'Usar luvas para aplicação',
    'Ventilar o ambiente durante o uso',
    'Não inalar os vapores',
    'Evitar contato com mucosas',
    'Não aplicar sobre queimaduras',
    'Suspender uso em caso de irritação',
    
    // Duração
    'Usar por 7 dias',
    'Tratamento de 30 dias',
    'Uso prolongado',
    'Uso temporário',
    'Até a melhora dos sintomas',
    'Ciclo de 3 meses',
    'Aplicar até absorver',
    'Deixar agir por 5 minutos',
    'Deixar agir por 15 minutos',
    'Deixar agir por 30 minutos',
    'Deixar agir por 1 hora',
    'Deixar agir durante a noite',
    'Enxaguar após 10 minutos',
    'Não enxaguar',
        ];

        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'user_id' => $empresa->id,
                'name' => fake()->randomElement($nomesProdutos),
                'description' => fake()->paragraph(),
                'price' => fake()->randomFloat(2, 10, 5000),
                'quantity_available' => fake()->numberBetween(0, 100),
                'weight' => fake()->numberBetween(0, 100),
                'brand' => fake()->company,
                'usage' => fake()->randomElement($usages),
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
