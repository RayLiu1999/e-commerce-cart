<?php

namespace Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    static $product_id;

    public function get($uri, $controller = [])
    {   
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller = [])
    {
        $this->routes['POST'][$uri] = $controller;

    }

    public function delete($uri, $controller = [])
    {
        $this->routes['DELETE'][$uri] = $controller;

    }
    
    public function direct($uri, $requestType)
    {

        $check_uri = explode('/', $uri);
        if ($requestType  === 'GET' && $check_uri[0] === 'products') {
            preg_match('/' . "^(products\/*)$" . '/', $uri, $matches);
            if (!empty($matches)) {
                header('Location: /e-commerce-cart');
                exit();
            }
        }
        if (!empty($check_uri[1])) {
            $this::$product_id = (int)$check_uri[1];
            $uri = $check_uri[0] . '/{id}';
        }

        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                $this->routes[$requestType][$uri][0],
                $this->routes[$requestType][$uri][1]
            );
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
        }
    }

    public function callAction($controller, $action)
    {
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            echo("{$controller}中並未包含{$action}方法");
        };

        return $controller->$action();
    }
}