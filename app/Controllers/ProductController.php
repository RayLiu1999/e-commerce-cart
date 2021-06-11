<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function show()
    {
        $product = $this->model->getProduct();
        $descs = explode('/', $product->description);
        view('product', [
            'product' => $product,
            'descs' => $descs
        ]);
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            if (!isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] = 0;
            }

            $_SESSION['cart'][$product_id] += $quantity;

            echo json_encode($_SESSION);
        }
    }

}

