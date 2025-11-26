<?php

namespace App\Http\Controllers;

use App\Models\Message;

class SSEController extends Controller
{
    public function stream($productId)
    {
        set_time_limit(0);

        header("Content-Type: text/event-stream");
        header("Cache-Control: no-cache");
        header("Connection: keep-alive");

        $lastId = 0;

        while (true) {

            $messages = Message::where('id', '>', $lastId)
                ->orderBy('id', 'asc')
                ->get();

            if ($messages->isNotEmpty()) {

                $payload = [
                    'messages' => $messages,
                ];

                echo "data: " . json_encode($payload) . "\n\n";

                ob_flush();
                flush();
            }

            sleep(1);
        }
    }
}
