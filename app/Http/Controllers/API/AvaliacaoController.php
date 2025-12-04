<?php

namespace App\Http\Controllers\API;

use App\Guards\AuthGuard;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $store = User::where('id', 2)->where('role', 'store')->first();
        $avaliacoes = Avaliacao::where('store_id', $store->id)->orderByDesc('created_at')->get();
        $produtos = Product::where('user_id', $store->id)->orderByDesc('created_at')->get();

        return view('loja', [
            'store' => $store,
            'avaliacoes' => $avaliacoes,
            'produtos' => $produtos
        ]);
    }
}
