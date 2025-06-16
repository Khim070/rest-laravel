<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function sendResponse($data = [], int $code = 200, string $msg = 'OK', string $statusCode = 'success'): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'status_code' => $statusCode,
            'message' => $msg,
            'data' => is_array($data) && count($data) === 1 ? $data[0] : $data,
        ], $code);
    }

    public function sendError(string $msg = 'Error', int $code = 400, ?array $data = null): JsonResponse
    {
        $response = [
            'status' => $code,
            'status_code' => 'error',
            'message' => $msg,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
