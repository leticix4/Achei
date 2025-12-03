<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // importa o model

class BuscaController extends Controller
{
    public function lista(Request $request)
    {
        $q     = $request->input('q');      // termo digitado
        $sort  = $request->input('sort');   // filtro de ordenação

        // começa buscando só produtos disponíveis
        $query = Product::available();

        // se tiver termo digitado, aplica o escopo de busca
        if ($q) {
            $query->search($q);
        }

        // filtros de ordenação
        if ($sort === 'preco_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'preco_desc') {
            $query->orderBy('price', 'desc');
        } //elseif ($sort === 'avaliacao_desc') {
            // se tiver coluna de rating em products, senão pode tirar esse filtro
           // $query->orderBy('rating', 'desc');
        //}

        // 25 itens por página (5 linhas x 5 colunas)
        $products = $query->paginate(25)->withQueryString();

        return view('busca-lista', compact('products', 'q', 'sort'));
    }
}
