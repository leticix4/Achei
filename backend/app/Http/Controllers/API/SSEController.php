<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class SSEController extends Controller
{
    public function stream(Request $request)
    {
        $user = $request->user();

        set_time_limit(0);

        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");
        header("Connection: keep-alive");

        header("Access-Control-Allow-Origin: http://localhost:5500");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $lastNotificationId = 0;

        return response()->stream(function () use ($user, &$lastNotificationId) {
            while (true) {
                // Check for new notifications
                $newNotifications = $user->notifications()
                    ->where('id', '>', $lastNotificationId)
                    ->orderBy('id')
                    ->get();

                if ($newNotifications->isNotEmpty()) {
                    $lastNotificationId = $newNotifications->last()->id;

                    echo "data: " . json_encode([
                        'type' => 'notifications',
                        'data' => $newNotifications->map(function ($notification) {
                            return [
                                'id' => $notification->id,
                                'type' => $notification->type,
                                'data' => $notification->data,
                                'read_at' => $notification->read_at,
                                'created_at' => $notification->created_at,
                            ];
                        })
                    ]) . "\n\n";

                    ob_flush();
                    flush();
                } else {
                    // Ping to keep connection alive
                    echo ": ping\n\n";
                    ob_flush();
                    flush();
                }

                sleep(2); // Check every 2 seconds
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }
}
