<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    public function rate(Request $request, $productId)
    {
        $request->validate([
            'stars' => 'required|integer|min:1|max:5',
        ]);

        $userId = Auth::id();

        $rating = ProductRating::updateOrCreate(
            [
                'user_id'    => $userId,
                'product_id' => $productId
            ],
            [
                'stars' => $request->stars
            ]
        );

        return response()->json([
            'message' => 'Avaliação salva com sucesso!',
            'data'    => $rating
        ]);
    }

    public function list($productId)
    {
        $ratings = ProductRating::where('product_id', $productId)
            ->with('user:id,name')
            ->get();

        return response()->json([
            'data' => $ratings
        ]);
    }
}
