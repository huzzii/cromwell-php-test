<?php

require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../helpers/Response.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Response::error('Method Not Allowed', [], 405);
}

$contentType = $_SERVER['CONTENT_TYPE'] ?? '';

if (strpos($contentType, 'application/json') !== false) {

    $data = json_decode(file_get_contents('php://input'), true);

    if (!is_array($data)) {
        Response::error('Invalid JSON.', [], 400);
    }

} else {

    $data = $_POST;

}

$controller = new UserController();
$controller->login($data);