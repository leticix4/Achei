<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliacao;
use App\Models\Product;
use App\Models\User;
use App\Services\ResponseService;

class WebStoreController extends Controller
{
    public function show(User $user)
    {

        if (!$user || !$user->role == 'store') {
            return ResponseService::error('Loja não encontrada.', 404);
        };

        $avaliacoes = Avaliacao::all();

        return view('loja-cliente', [
            'loja' => $user,
            'avaliacoes' => $avaliacoes,
        ]);
    }

    public function storeProducts(User $user)
    {
        if (!$user || !$user->role == 'store') {
            return ResponseService::error('Loja não encontrada.', 404);
        };

        $products = Product::where('user_id', $user->id)->get();

        return view('loja-produtos', [
            'loja' => $user,
            'products' => $products,
        ]);
    }
}
