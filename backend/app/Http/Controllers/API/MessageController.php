<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Message;
use App\Models\Product;
use App\Models\User;
use App\Services\MessageService;
use App\Services\ResponseService;

class MessageController extends Controller
{
    public function __construct(protected MessageService $messageService) {}

    public function index(Request $request, Product $product): JsonResponse
    {
        $user = $request->user();
        $messages = Message::where('product_id', $product->id)
            ->where('user_id', $user->id)
            ->get();

        return ResponseService::success(
            MessageResource::collection($messages),
            'Mensagens recuperadas com sucesso'
        );
    }

    public function create(Request $request, Product $product): JsonResponse
    {
        $user = $request->user();

        $data['product_id'] = $product->id;
        $data['user_id'] = $user->id;
        $data['content'] = $request->input('content');

        $message = $this->messageService->create($data);

        return response()->json([
            'success' => true,
            'data' => MessageResource::make($message)
        ], 201);
    }

    public function storeMessages(Request $request, Product $product, User $user): JsonResponse
    {
        $messages = Message::where('product_id', $product->id)
            ->where('user_id', $user->id)
            ->get();

        return ResponseService::success(
            MessageResource::collection($messages),
            'Mensagens recuperadas com sucesso'
        );
    }

    public function createStoreResponse(Request $request, Product $product, User $user): JsonResponse
    {
        $data['product_id'] = $product->id;
        $data['user_id'] = $user->id;
        $data['content'] = $request->input('content');
        $data['is_store'] = true;

        $message = $this->messageService->create($data);

        return response()->json([
            'success' => true,
            'data' => MessageResource::make($message)
        ], 201);
    }
}
