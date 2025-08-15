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

$parts = null;
$id = null;
if(preg_match('#^/edit/(\d+)$#', $uri, $matches)){
    
    if(isset($matches[1])) {
        $id = $matches[1];
        $uri = ltrim($uri, '/');
        $parts = explode('/', $uri);
        $uri = '/' . $parts[0];
    }
}

if (array_key_exists($uri, $routes)) {
    $action = $routes[$uri];
    if (method_exists($controller, $action)) {

        $controller->$action($id);
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

