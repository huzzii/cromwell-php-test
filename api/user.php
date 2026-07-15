<?php

require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../helpers/Response.php';

$controller = new UserController();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        $controller->register($_POST);
        break;

    case 'GET':
        if (!isset($_GET['id'])) {
            Response::error("User ID required");
        }
        $controller->getUser($_GET['id']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['id'])) {
            Response::error("User ID required");
        }

        $controller->update($data['id'], $data);
        break;
    default:
        Response::error("Method Not Allowed", [], 405);
}