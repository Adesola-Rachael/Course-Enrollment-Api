<?php

namespace App\Traits;

trait ResponseTrait{
    public function success($message, $data = [], $status )
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'status'=>$status
        ], $status);
    }

    public function failure($message, $status)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'status'=>$status
        ], $status);
    }


}