<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Message;
use App\Transformers\MessageResource;

class MessageController extends Controller
{
    public function index($productID): JsonResponse
    {
        $messages = Message::where('product_id', $productID)->get();
        return response()->json([
            'success' => true,
            'data' => MessageResource::collection($messages)
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        $message = Message::create([
            'content' => $request->input('content'),
            'product_id' => $request->input('product_id'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json([
            'success' => true,
            'data' => MessageResource::make($message)
        ], 201);
    }
}
