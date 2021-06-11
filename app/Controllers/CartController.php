<?php

namespace App\Controllers;

use App\Models\Cart;
use Core\Router;

class CartController
{
    private $model;

    public function __construct()
    {
        $this->model = new Cart;
    }

    public function index()
    {
        $id = [];
        $total_price = 0;
        $cart = $_SESSION['cart'] ?? '';

        if (!isset($_SESSION['logged_in'])) {
            redirect('login');
            exit();
        }

        if (!empty($cart)) {
            foreach ($cart as $product_id => $quantity) {
                array_push($id, $product_id);
            }

            $products = $this->model->getCartPd(implode(',', $id));

            foreach ($products as $product) {
                $total_price += (int)$product->price * $cart[$product->id];
            }
        }
            
        view('cart', [
            'products' => $products ?? '',
            'cart' => $cart ?? '',
            'total_price' => $total_price
        ]);
    }

    public function delete()
    {
        if (isset($_SESSION['cart'])) {
            $product_id = Router::$product_id;
            unset($_SESSION['cart'][$product_id]);
        }

    }

    public function update()
    {
        $product_id = Router::$product_id;
        $_SESSION['cart'][$product_id] = (int)$_POST['quantity'];
    }

}