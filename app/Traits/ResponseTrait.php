<?php

namespace App\Traits;

trait ResponseTrait{
    public function setResponse($message, $data = [], $status )
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'statusCode' => $status,
        ]);
    }
}