<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\API\CreateUserRequest;
use App\Http\Requests\API\LoginRequest;
use App\Services\ResponseService;
use App\Services\UserService;
use App\Http\Resources\UserWithTokenResource;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function register(CreateUserRequest $request): JsonResponse
    {
        $user = $this->userService->create($request->validated());

        return ResponseService::success(
            UserWithTokenResource::make($user),
            'Usuário registrado com sucesso',
            201
        );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userService->getUserByCredentials($request->validated());

        return ResponseService::success(
            UserWithTokenResource::make($user),
            'Sessão iniciada com sucesso',
            201
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        // Remover o token do cache
        Cache::forget('user_token_' . $request->user()->id);

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }

    public function user(Request $request): JsonResponse
    {
        return response()->json([
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'role' => $request->user()->role ?? null,
            ]
        ]);
    }

    public function notifications(Request $request): JsonResponse
    {
        $notifications = $request->user()->notifications()->orderByDesc('created_at')->paginate(20);

        return response()->json([
            'data' => $notifications->items(),
            'meta' => [
                'current_page' => $notifications->currentPage(),
                'total' => $notifications->total(),
                'per_page' => $notifications->perPage(),
                'unread_count' => $request->user()->unreadNotifications()->count(),
            ]
        ]);
    }

    public function markNotificationsRead(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json([
            'message' => 'Notificações marcadas como lidas'
        ]);
    }
}
