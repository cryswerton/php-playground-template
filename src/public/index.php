<?php

require_once __DIR__ . '/../private/database.php';
require_once __DIR__ . '/../private/functions/functions.php';
require_once __DIR__ . '/../private/controllers/Controller.php';

$controller = new Controller($pdo);

$action = $_GET['action'] ?? 'index';

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    http_response_code(404);
    echo "Action not found.";
}

?>

