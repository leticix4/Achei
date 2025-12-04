<?php

use App\Http\Controllers\API\AvaliacaoController;
use App\Http\Controllers\BuscaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\API\ProductController; 
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name('home');

/**
 * LISTA DE RESULTADOS DA BUSCA (pessoa digitou "arroz" na barra)
 * Usa a view de lista (ex: busca-lista.blade.php)
 */
Route::get('/busca', [BuscaController::class, 'lista'])->name('busca.lista');

Route::get('/cadastro-completo', function () {
    return view('cadastro-completo');
})->name('cadastro-completo');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/esqueci-senha', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/esqueci-senha', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/resetar-senha/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/resetar-senha', [PasswordResetController::class, 'reset'])->name('password.update');

/**
 * CADASTRO DE PRODUTO (LOJISTA)
 */
Route::get('/produto/cadastro', [ProdutoController::class, 'create'])->name('cadastro-produto');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');

/**
 * DETALHE DO PRODUTO + MAPA DAS LOJAS
 * Ex: /produto/5
 * Usa ProdutoController@show e a view "busca.blade.php" (que é a página do produto + mapa)
 */
Route::get('/produto/{product}', [ProdutoController::class, 'show'])->name('produto');

/**
 * PÁGINA DA LOJA (AVALIAÇÕES, ETC.)
 */
Route::get('/loja', [AvaliacaoController::class, 'index'])->name('loja');

/**
 * CATEGORIAS ESTÁTICAS
 */
Route::get('/categoria/{slug}', function ($slug) {
    $dbCategorias = [
        'supermercado' => [
            'titulo' => 'SUPERMERCADO',
            'itens' => [
                ['nome' => 'Mercearia', 'img' => 'cesta.png'],
                ['nome' => 'Matinais', 'img' => 'cereal.png'],
                ['nome' => 'Bebidas', 'img' => 'agua.png'],
                ['nome' => 'Bebidas Alcoólicas', 'img' => 'vinho.png'],
                ['nome' => 'Frios e Laticínios', 'img' => 'queijo.png'],
                ['nome' => 'Açougue', 'img' => 'carne.png'],
                ['nome' => 'Hortifrúti', 'img' => 'cenoura.png'],
                ['nome' => 'Padaria e Confeitaria', 'img' => 'pao.png'],
                ['nome' => 'Limpeza', 'img' => 'limpeza.png'],
                ['nome' => 'Higiene Pessoal', 'img' => 'creme.png'],
                ['nome' => 'Bomboniere', 'img' => 'chocolate.png'],
            ]
        ],
        'tecnologia' => [
            'titulo' => 'TECNOLOGIA',
            'itens' => [
                ['nome' => 'Celulares e Smartphones', 'img' => 'celular.png'],
                ['nome' => 'Notebooks', 'img' => 'note.png'],
                ['nome' => 'TVs e Vídeo', 'img' => 'tv.png'],
                ['nome' => 'Mundo Gamer', 'img' => 'xbox.png'],
                ['nome' => 'Periféricos', 'img' => 'mouse.png'],
                ['nome' => 'Hardware', 'img' => 'vga.png'],
                ['nome' => 'Áudio e Som', 'img' => 'fone.png'],
                ['nome' => 'Impressoras', 'img' => 'impressora.png'],
                ['nome' => 'Redes e Wi-Fi', 'img' => 'router.png'],
            ]
        ],
        'casa-moveis' => [
            'titulo' => 'CASA E MÓVEIS',
            'itens' => [
                ['nome' => 'Sala de Estar', 'img' => 'sofa.png'],
                ['nome' => 'Quarto', 'img' => 'cama.png'],
                ['nome' => 'Cozinha', 'img' => 'armario.png'],
                ['nome' => 'Escritório', 'img' => 'escrivaninha.png'],
                ['nome' => 'Decoração', 'img' => 'vaso.png'],
                ['nome' => 'Iluminação', 'img' => 'abaju1.png'],
                ['nome' => 'Jardinagem', 'img' => 'regador.png'],
                ['nome' => 'Organização', 'img' => 'organizador.png'],
            ]
        ],
        'eletrodomesticos' => [
            'titulo' => 'ELETRODOMÉSTICOS',
            'itens' => [
                ['nome' => 'Geladeiras e Freezers', 'img' => 'geladeira.png'],
                ['nome' => 'Fogões e Cooktops', 'img' => 'fogao.png'],
                ['nome' => 'Lavadoras e Secadoras', 'img' => 'lavadora.png'],
                ['nome' => 'Micro-ondas e Fornos', 'img' => 'microondas.png'],
                ['nome' => 'Climatização', 'img' => 'ventilador.png'],
                ['nome' => 'Eletroportáteis', 'img' => 'cafeteira.png'],
                ['nome' => 'Aspiradores', 'img' => 'aspirador.png'],
                ['nome' => 'Cuidados Pessoais', 'img' => 'secador.png'],
            ]
        ],
        'esportes' => [
            'titulo' => 'ESPORTES E FITNESS',
            'itens' => [
                ['nome' => 'Roupas e Calçados', 'img' => 'tenis.png'],
                ['nome' => 'Equipamentos', 'img' => 'halter.png'],
                ['nome' => 'Suplementos', 'img' => 'whey.png'],
                ['nome' => 'Futebol', 'img' => 'bola.png'],
                ['nome' => 'Ciclismo', 'img' => 'bike1.png'],
                ['nome' => 'Artes Marciais', 'img' => 'boxe.png'],
                ['nome' => 'Natação', 'img' => 'natacao.png'],
                ['nome' => 'Yoga e Pilates', 'img' => 'yoga.png'],
            ]
        ],
        'ferramentas' => [
            'titulo' => 'FERRAMENTAS',
            'itens' => [
                ['nome' => 'Elétricas', 'img' => 'furadeira.png'],
                ['nome' => 'A Bateria', 'img' => 'parafusadeira.png'],
                ['nome' => 'Manuais', 'img' => 'martelo.png'],
                ['nome' => 'Proteção', 'img' => 'luva.png'],
                ['nome' => 'Medição', 'img' => 'multimetro.png'],
                ['nome' => 'Jardinagem', 'img' => 'rocadeira.png'],
                ['nome' => 'Caixas', 'img' => 'caixa.png'],
            ]
        ],
        'construcao' => [
            'titulo' => 'CONSTRUÇÃO',
            'itens' => [
                ['nome' => 'Materiais', 'img' => 'tijolo1.png'],
                ['nome' => 'Pisos', 'img' => 'piso.png'],
                ['nome' => 'Elétrica', 'img' => 'fio.png'],
                ['nome' => 'Hidráulica', 'img' => 'canos.png'],
                ['nome' => 'Tintas', 'img' => 'tinta.png'],
                ['nome' => 'Portas', 'img' => 'porta.png'],
                ['nome' => 'Louças', 'img' => 'sanitario.png'],
            ]
        ],
        'autopecas' => [
            'titulo' => 'AUTOPEÇAS',
            'itens' => [
                ['nome' => 'Motor', 'img' => 'motor.png'],
                ['nome' => 'Freios', 'img' => 'freio.png'],
                ['nome' => 'Suspensão', 'img' => 'amortecedor.png'],
                ['nome' => 'Óleos', 'img' => 'oleo.png'],
                ['nome' => 'Elétrica', 'img' => 'ignicao.png'],
                ['nome' => 'Pneus', 'img' => 'roda.png'],
                ['nome' => 'Arrefecimento', 'img' => 'radiador.png'],
            ]
        ],
        'papelaria' => [
            'titulo' => 'PAPELARIA',
            'itens' => [
                ['nome' => 'Escolar', 'img' => 'lapis.png'],
                ['nome' => 'Escritório', 'img' => 'calculadora.png'],
                ['nome' => 'Cadernos', 'img' => 'cadernos.png'],
                ['nome' => 'Canetas', 'img' => 'caneta.png'],
                ['nome' => 'Mochilas', 'img' => 'mochila.png'],
                ['nome' => 'Arte', 'img' => 'arte.png'],
                ['nome' => 'Organização', 'img' => 'organizador.png'],
            ]
        ],
        'petshop' => [
            'titulo' => 'PET SHOP',
            'itens' => [
                ['nome' => 'Cães', 'img' => 'cao.png'],
                ['nome' => 'Gatos', 'img' => 'gato.png'],
                ['nome' => 'Pássaros', 'img' => 'ave.png'],
                ['nome' => 'Peixes', 'img' => 'peixe.png'],
                ['nome' => 'Rações', 'img' => 'racao.png'],
                ['nome' => 'Brinquedos', 'img' => 'briqpet.png'],
                ['nome' => 'Higiene', 'img' => 'xampopet.png'],
                ['nome' => 'Farmácia', 'img' => 'remediopet.png'],
            ]
        ],
        'saude' => [
            'titulo' => 'SAÚDE',
            'itens' => [
                ['nome' => 'Cuidados', 'img' => 'higiene.png'],
                ['nome' => 'Vitaminas', 'img' => 'remedio.png'],
                ['nome' => 'Primeiros Socorros', 'img' => 'socorro.png'],
                ['nome' => 'Aparelhos', 'img' => 'pressao.png'],
                ['nome' => 'Ortopédicos', 'img' => 'ortope.png'],
                ['nome' => 'Bem-estar', 'img' => 'vela.png'],
                ['nome' => 'Higiene', 'img' => 'creme.png'],
            ]
        ],
        'veiculos' => [
            'titulo' => 'VEÍCULOS',
            'itens' => [
                ['nome' => 'Som e Vídeo', 'img' => 'som.png'],
                ['nome' => 'Tapetes', 'img' => 'banco.png'],
                ['nome' => 'Segurança', 'img' => 'alarme.png'],
                ['nome' => 'Limpeza', 'img' => 'cera.png'],
                ['nome' => 'Externos', 'img' => 'hackteto.png'],
                ['nome' => 'GPS', 'img' => 'gps.png'],
            ]
        ],
        'beleza' => [
            'titulo' => 'BELEZA',
            'itens' => [
                ['nome' => 'Cabelos', 'img' => 'xampoo.png'],
                ['nome' => 'Perfumaria', 'img' => 'perfume.png'],
                ['nome' => 'Maquiagem', 'img' => 'maquiage.png'],
                ['nome' => 'Pele', 'img' => 'cremepele.png'],
                ['nome' => 'Corpo', 'img' => 'saboete.png'],
                ['nome' => 'Unhas', 'img' => 'unha.png'],
                ['nome' => 'Barbearia', 'img' => 'barba.png'],
            ]
        ],
        'moda' => [
            'titulo' => 'MODA',
            'itens' => [
                ['nome' => 'Feminina', 'img' => 'vestido1.png'],
                ['nome' => 'Masculina', 'img' => 'terno.png'],
                ['nome' => 'Infantil', 'img' => 'roupabb.png'],
                ['nome' => 'Calçados', 'img' => 'tenis.png'],
                ['nome' => 'Acessórios', 'img' => 'bolsa.png'],
                ['nome' => 'Praia', 'img' => 'praia.png'],
                ['nome' => 'Íntima', 'img' => 'intima.png'],
            ]
        ],
        'bebes' => [
            'titulo' => 'BEBÊS',
            'itens' => [
                ['nome' => 'Fraldas', 'img' => 'fralda.png'],
                ['nome' => 'Alimentação', 'img' => 'comidabb.png'],
                ['nome' => 'Carrinhos', 'img' => 'bbconforto.png'],
                ['nome' => 'Berços', 'img' => 'berco.png'],
                ['nome' => 'Roupas', 'img' => 'roupabb.png'],
                ['nome' => 'Brinquedos', 'img' => 'bbbrinquedo.png'],
                ['nome' => 'Segurança', 'img' => 'bbcerca.png'],
            ]
        ],
        'brinquedos' => [
            'titulo' => 'BRINQUEDOS',
            'itens' => [
                ['nome' => 'Bonecas', 'img' => 'boneca.png'],
                ['nome' => 'Montar', 'img' => 'montar.png'],
                ['nome' => 'Tabuleiro', 'img' => 'xadrez.png'],
                ['nome' => 'Carrinhos', 'img' => 'hotwell.png'],
                ['nome' => 'Heróis', 'img' => 'heroi.png'],
                ['nome' => 'Educativos', 'img' => 'educainfa.png'],
                ['nome' => 'Playground', 'img' => 'playground.png'],
            ]
        ],
    ];

    if (!array_key_exists($slug, $dbCategorias)) {
        abort(404); 
    }

    $dados = $dbCategorias[$slug];

    return view('categoria', [
        'titulo' => $dados['titulo'],
        'itens' => $dados['itens']
    ]);

})->name('categoria.show');
 

/**
 * ROTAS PROTEGIDAS (LOJISTA PJ)
 */
Route::middleware('auth:sanctum')->group(function () { 

    Route::group(['middleware' => function ($request, $next) {
        
        if (!Auth::check() || Auth::user()->type !== 'pj') {
            abort(403, 'Acesso restrito a contas PJ (Lojistas).');
        }

        return $next($request);

    }], function () {
        
        Route::get('/cadastroproduto', function () {
            return view('cadastro-produto');
        })->name('cadastro-produto'); 
        
        Route::get('/loja/produtos', function () {
            return view('lista-produtos'); 
        })->name('loja.produtos.lista');
        
        Route::post('/api/products', [ProductController::class, 'store'])->name('produto.store');
    });
});
