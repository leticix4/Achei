<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateStoreRequest;
use App\Models\Store;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoreWithProductsResource;
use App\Http\Resources\StoreWithTokenResource;
use App\Services\ResponseService;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{

    public function __construct(protected StoreService $storeService) {}

    public function index(Request $request): JsonResponse
    {
        $query = Store::active();

        if ($request->has('category')) {
            $query->byCategory($request->category);
        }

        $stores = $query->paginate(15);

        return response()->json([
            'data' => StoreResource::collection($stores),
            'meta' => [
                'current_page' => $stores->currentPage(),
                'total' => $stores->total(),
                'per_page' => $stores->perPage(),
            ]
        ]);
    }

    public function create(CreateStoreRequest $request): JsonResponse
    {
        $store = $this->storeService->create($request->validated());

        return ResponseService::success(
            new StoreWithTokenResource($store),
            "Loja cadastrada com sucesso",
            201
        );
    }

    public function show($id): JsonResponse
    {
        $store = Store::active()->with(['products' => function ($query) {
            $query->available()->orderBy('name');
        }])->findOrFail($id);

        return response()->json([
            'data' => new StoreWithProductsResource($store)
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $store = Store::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'address' => 'sometimes|string',
            'phone' => 'sometimes|string|max:20',
            'responsible' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'image_url' => 'sometimes|nullable|url',
            'latitude' => 'sometimes|numeric|between:-90,90',
            'longitude' => 'sometimes|numeric|between:-180,180',
            'is_active' => 'sometimes|boolean',
        ]);

        $store->update($validated);

        return response()->json([
            'message' => 'Loja atualizada com sucesso',
            'data' => new StoreResource($store)
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $store = Store::findOrFail($id);
        $store->update(['is_active' => false]);

        return response()->json([
            'message' => 'Loja desativada com sucesso'
        ]);
    }
}
