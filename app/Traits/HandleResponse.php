<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HandleResponse
{

    public function successResponse($data = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    public function errorResponse($message = ''): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }



}
