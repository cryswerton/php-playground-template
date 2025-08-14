<?php

require_once __DIR__ . '/../private/database.php';
require_once __DIR__ . '/../private/functions/functions.php';
require_once __DIR__ . '/../private/controllers/Controller.php';

$routes = [
    '/' => 'index',
    '/add' => 'add',
    '/create' => 'create',
    '/edit' => 'edit',
    '/update' => 'update',
    '/delete' => 'delete'
];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = new Controller($pdo);

if(array_key_exists($uri, $routes)) {
    $action = $routes[$uri];
    if(method_exists($controller, $action)) {
        $controller->$action();
    } else {
        http_response_code(404);
        echo "Action not found.";
        exit;
    }
} else {
    http_response_code(404);
    echo "Page not found.";
    exit;
}

?>

