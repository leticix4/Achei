<?php

namespace App\Services;

use Illuminate\Http\Response;

class ResponseService
{
    public static function success($data = [], $message = 'Success', $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
