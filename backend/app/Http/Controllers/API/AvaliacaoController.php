<?php

namespace App\Http\Controllers\API;

use App\Models\Avaliacao; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;

class AvaliacaoController extends Controller
{
    public function index(Request $request, Store $store)
    {
        $avaliacoes = Avaliacao::where('store_id', $store->id)->orderByDesc('created_at')->get();
        
        return view('loja', [
            'avaliacoes' => $avaliacoes
        ]);
    }
}