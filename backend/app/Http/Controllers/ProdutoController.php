<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProdutoController extends Controller
{
    public function show(Product $product)
    {
        // Ofertas do mesmo produto em outras lojas
        // critério: mesmo sku. Se não tiver sku, usa name.
        $query = Product::with('store')
            ->where('is_available', true)
            ->whereHas('store', function ($q) {
                $q->whereNotNull('latitude')
                  ->whereNotNull('longitude')
                  ->where('is_active', true);
            });

        if (!empty($product->sku)) {
            $query->where('sku', $product->sku);
        } else {
            $query->where('name', $product->name);
        }

        $offers = $query->get();

        // Dados simplificados para o mapa (JS)
        $offersForMap = $offers->map(function ($offer) {
            $store = $offer->store;

            return [
                'store_name' => $store?->trade_name ?? $store?->name ?? 'Loja',
                'price'      => number_format($offer->price, 2, ',', '.'),
                'rating'     => null, // se tiver rating depois você preenche
                'address'    => '',   // se quiser, puxa de Address depois
                'lat'        => $store?->latitude ? (float)$store->latitude : null,
                'lng'        => $store?->longitude ? (float)$store->longitude : null,
            ];
        })->filter(function ($p) {
            return $p['lat'] !== null && $p['lng'] !== null;
        })->values();

        return view('busca', [
            'product'      => $product,
            'offers'       => $offers,
            'offersForMap' => $offersForMap,
        ]);
    }

    public function create()
    {
        return view('cadastro-produto');
    }
}
