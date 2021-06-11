<?php

namespace App\Models;

use Database;
use Core\Router;

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    public function getProduct()
    {
        $product_id = Router::$product_id;
        $this->db->query("SELECT id, name, price, quantity, description, image_url  FROM products WHERE id='$product_id'");
        $product = $this->db->result();
        return $product;
    }

}