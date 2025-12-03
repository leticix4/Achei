<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function searchProducts(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:2',
            'category' => 'sometimes|string',
            'brand' => 'sometimes|string',
            'max_price' => 'sometimes|numeric|min:0',
            'min_price' => 'sometimes|numeric|min:0',
            'store_id' => 'sometimes|exists:stores,id',
            'sort_by' => 'sometimes|in:relevance,price_asc,price_desc,name,store',
        ]);

        $searchTerm = $request->q;
        $filters = $request->only([
            'category',
            'brand',
            'max_price',
            'min_price',
            'store_id',
            'sort_by'
        ]);

        $cacheKey = 'search_' . md5($searchTerm . serialize($filters));

        $products = Cache::remember($cacheKey, 300, function () use ($searchTerm, $filters) {
            return $this->performSearch($searchTerm, $filters);
        });

        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'search_term' => $searchTerm,
                'filters_applied' => $filters,
                'total_results' => $products->count(),
            ]
        ]);
    }

    private function performSearch($searchTerm, $filters)
    {
        $query = Product::available()
            ->with(['store' => function ($query) {
                $query->active();
            }])
            ->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
            });

        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['brand'])) {
            $query->where('brand', $filters['brand']);
        }

        if (isset($filters['store_id'])) {
            $query->where('store_id', $filters['store_id']);
        }

        $sortBy = $filters['sort_by'] ?? 'relevance';
        $this->applySorting($query, $sortBy);

        return $query->get();
    }

    private function applySorting($query, $sortBy)
    {
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'store':
                $query->join('stores', 'products.store_id', '=', 'stores.id')
                    ->orderBy('stores.name', 'asc')
                    ->select('products.*');
                break;
            default:
                $query->orderBy('price', 'asc');
                break;
        }
    }

    public function searchNearby(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:2',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'radius' => 'sometimes|numeric|min:1|max:50',
        ]);

        $products = $this->performNearbySearch(
            $request->q,
            $request->lat,
            $request->lng,
            $request->radius ?? 10
        );

        return response()->json([
            'data' => ProductResource::collection($products),
            'meta' => [
                'search_term' => $request->q,
                'user_location' => [
                    'latitude' => (float) $request->lat,
                    'longitude' => (float) $request->lng,
                ],
                'search_radius_km' => $request->radius ?? 10,
                'total_results' => $products->count(),
            ]
        ]);
    }

    private function performNearbySearch($searchTerm, $userLat, $userLng, $radiusKm)
    {
        $haversine = "(6371 * acos(cos(radians($userLat))
                       * cos(radians(latitude))
                       * cos(radians(longitude) - radians($userLng))
                       + sin(radians($userLat))
                       * sin(radians(latitude))))";

        return Product::available()
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->select('products.*')
            ->selectRaw("$haversine AS distance")
            ->whereRaw("$haversine < ?", [$radiusKm])
            ->with(['store'])
            ->where(function ($q) use ($searchTerm) {
                $q->where('products.name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('products.description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('products.brand', 'LIKE', "%{$searchTerm}%");
            })
            ->orderBy('distance')
            ->get();
    }

    public function getCategories(): JsonResponse
    {
        $categories = Product::distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->sort()
            ->values();

        return response()->json([
            'data' => $categories
        ]);
    }

    public function getBrands(): JsonResponse
    {
        $brands = Product::distinct()
            ->whereNotNull('brand')
            ->pluck('brand')
            ->sort()
            ->values();

        return response()->json([
            'data' => $brands
        ]);
    }
}
