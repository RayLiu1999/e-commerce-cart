<?php

namespace App\Controllers;

class HomeController
{
    public function addToCart()
    {
        $product_id = $_POST['product_id'];

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 0;
        }
        $_SESSION['cart'][$product_id] += 1;
        echo json_encode($_SESSION['cart']);
    }
}