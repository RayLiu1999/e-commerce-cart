<?php

namespace App\Models;

use Database;

class Home
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllPro()
    {
        $this->db->query('SELECT id, name, price, quantity, image_url FROM products');
        $products = $this->db->resultAll();
        return $products;
    }

}
