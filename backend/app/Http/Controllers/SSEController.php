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

        header("Access-Control-Allow-Origin: http://localhost:5500");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $lastId = 0;

        return response()->stream(function () {
            while (true) {
                // Mensagem enviada ao front
                echo "data: " . json_encode("teste") . "\n\n";

                ob_flush();
                flush();

                // Espera 1 segundo antes de enviar a próxima
                sleep(1);

                //     if (true) {

                //     // $lastId = $messages->last()->id; // 🔥 ESSENCIAL

                //     echo "data: " . json_encode([
                //         'messages' => 'teste'
                //     ]) . "\n\n";

                //     ob_flush();
                //     flush();
                // } else {
                //     // 🔥 ping para manter a conexão aberta
                //     echo ": ping\n\n";
                //     ob_flush();
                //     flush();
                // }

            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }
}
