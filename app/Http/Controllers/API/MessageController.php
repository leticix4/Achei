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
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct(protected MessageService $messageService) {}

    public function index(Request $request, Product $product): JsonResponse
    {
        $user = Auth::user();
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
        $user = Auth::user();

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
            ->where('user_id', 1)
            ->get();

        return ResponseService::success(
            MessageResource::collection($messages),
            'Mensagens recuperadas com sucesso'
        );
    }

    public function enviarMensagemLoja(Request $request)
    {
        Message::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'content' => $request->content,
            'is_store' => true,
        ]);

        return back();
    }

    public function getUnreadMessagesCount(Request $request): JsonResponse
    {
        $user = $request->user();

        $unreadCount = Message::where('user_id', $user->id)
            ->where('is_store', true)
            ->whereNull('read_at')
            ->count();
        return response()->json([
            'unread_count' => $unreadCount,
        ]);
    }
}
