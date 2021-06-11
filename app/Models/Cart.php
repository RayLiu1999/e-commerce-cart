<?php

namespace App\Models;

use Database;

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getCartPd($cart_array)
    {
        $this->db->query("SELECT id, name, price, quantity, image_url FROM products WHERE id in ({$cart_array})");
        $products = $this->db->resultAll();

        return $products;
    }
}
