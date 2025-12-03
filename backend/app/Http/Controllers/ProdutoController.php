<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRating; 
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Página de detalhes do produto
    public function show(Product $product)
    {
        // média e quantidade de avaliações (usando relacionamentos)
        $product->loadAvg('ratings', 'rating')
                ->loadCount('ratings');

        // nota que o usuário logado deu (se já tiver avaliado)
        $userRating = auth()->check()
            ? $product->ratings()
                ->where('user_id', auth()->id())
                ->first()
            : null;

        return view('produto', [
            'product'    => $product,
            'userRating' => $userRating,
        ]);
    }

    // Salvar / atualizar a avaliação do usuário
    public function rate(Request $request, Product $product)
    {
        $this->middleware('auth');

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'product_id' => $product->id,
                'user_id'    => auth()->id(),
            ],
            [
                'rating' => $data['rating'],
            ]
        );

        return back()->with('success', 'Avaliação registrada com sucesso!');
    }
}
