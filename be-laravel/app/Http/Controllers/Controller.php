<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function sendResponse($data = [], $status = 200, $message = "") 
    {
        $response = [
            'data' => $data,
            'status' => $status,
            'message' => $message,
            'code' => $status
        ];
        return response($response);
    }

    public function errorsResponse($errors, $status = 422, $message = "")
    {
        $response = [
            'data' => $errors,
            'code' => $status,
            'status' => $status,
            'message' => $message
        ];
        return response($response);
    }
}
