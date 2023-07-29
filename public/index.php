<?php
session_start();

require_once '../app/Core/Config/config.php';

// Autoload classes using namespaces
spl_autoload_register(function ($class) {

    $file = str_replace('\\', '/', $class) . '.php';

    if (file_exists('../' . $file)) {
        require_once '../' . $file;
    }
});

use App\Core\Router;

$router = new Router();

// Add routes to the router
$router->addRoute('/', 'HomeController', 'index');

// Get the requested URL and dispatch the corresponding controller and action
$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestUrl);

