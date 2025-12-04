<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function show(Product $product)
    {
        return view('produto', compact('product'));
    }

    public function create()
    {
        return view('cadastro-produto');
    }

    public function storeChat(Request $request, Product $product)
    {
        $conversas = Message::where('product_id', $product->id)
            ->orderBy('created_at')
            ->get()
            ->groupBy('user_id'); // separa por cliente

        return view('loja-chat', [
            'product' => $product,
            'conversas' => $conversas
        ]);
    }
}
