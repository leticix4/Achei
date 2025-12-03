<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
  
}
