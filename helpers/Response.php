<?php

class Response
{
    /**
     * Send a successful JSON response.
     */
    public static function success($message, $data = [], $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');

        echo json_encode([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);

        exit;
    }

    /**
     * Send an error JSON response.
     */
    public static function error($message, $errors = [], $statusCode = 400)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');

        echo json_encode([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ]);

        exit;
    }
}