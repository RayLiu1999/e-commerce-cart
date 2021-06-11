<?php

use Core\Request;
use Core\Router;
use App\Controllers\PagesController;
use App\Controllers\CartController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Controllers\HomeController;

$route = new Router;


$route->get('', [PagesController::class, 'home']);
$route->get('login', [PagesController::class, 'login']);
$route->get('register', [PagesController::class, 'register']);
$route->get('logout', [UserController::class, 'logout']);
$route->get('products/{id}', [ProductController::class, 'show']);
$route->get('cart', [CartController::class, 'index']);


$route->post('', [HomeController::class, 'addToCart']);
$route->post('login', [UserController::class, 'login']);
$route->post('register', [UserController::class, 'register']);
$route->post('products', [ProductController::class, 'addToCart']);
$route->post('cart/{id}', [CartController::class, 'update']);
$route->delete('cart/{id}', [CartController::class, 'delete']);


$route->direct(Request::uri(), Request::method());


