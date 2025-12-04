<?php

namespace App\Services;

use App\Enums\GenderEnum;
use App\Models\User;
use App\Models\Address;
use App\Enums\UserRoleEnum;
use App\Models\Message;
use App\Models\Store;
use App\Notifications\NewMessageNotification;

class MessageService
{
    public function __construct() {}

    public function create(array $data): Message
    {
        $message = Message::create([
            'content' => $data['content'],
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
            'is_store' => $data['is_store'] ?? false,
        ]);

        // Notify the product owner
        $storeOwner = User::where('id', $message->product->user_id)->first();
        $storeOwner->notify(new NewMessageNotification($message));

        return $message;
    }
}
