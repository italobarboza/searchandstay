<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Error response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
