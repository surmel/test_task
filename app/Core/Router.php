<?php

namespace App\Core;

class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @param $url
     * @param $controller
     * @param $action
     * @return void
     */
    public function addRoute($url, $controller, $action)
    {
        $this->routes[$url] = [
            'controller' => $controller,
            'action' => $action,
        ];
    }

    /**
     * @param $url
     * @return void
     */
    public function dispatch($url)
    {
        $url = str_replace('/test/public', '', $url);

        if (array_key_exists($url, $this->routes)) {
            $controllerName = 'App\\Controllers\\' . $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];

            if (class_exists($controllerName)) {

                $controller = new $controllerName();
                if (method_exists($controller, $action)) {
                    $controller->$action();
                    return;
                }
            }
        }

        // Handle 404 page not found
        http_response_code(404);
        echo '404 Page Not Found';
    }
}


