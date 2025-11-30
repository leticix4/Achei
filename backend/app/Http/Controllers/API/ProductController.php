<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::available()->with('store');

        if ($request->has('store_id')) {
            $query->where('store_id', $request->store_id);
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->paginate(20);

        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'total' => $products->total(),
                'per_page' => $products->perPage(),
            ]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'quantity_available' => 'required|integer|min:0',
            'brand' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'sku' => 'nullable|string|unique:products,sku',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Produto cadastrado com sucesso',
            'data' => new ProductResource($product->load('store'))
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'image_url' => 'sometimes|nullable|url',
            'price' => 'sometimes|numeric|min:0',
            'quantity_available' => 'sometimes|integer|min:0',
            'brand' => 'sometimes|string|max:100',
            'category' => 'sometimes|string|max:100',
            'sku' => 'sometimes|nullable|string|unique:products,sku,' . $product->id,
            'is_available' => 'sometimes|boolean',
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'data' => new ProductResource($product->load('store'))
        ]);
    }
}
