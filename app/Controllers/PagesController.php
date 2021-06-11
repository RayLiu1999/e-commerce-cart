<?php

namespace App\Controllers;

use App\Models\Home;

class PagesController
{
    private $model;

    public function __construct()
    {
        $this->model = new Home;
    }

    public function home()
    {
        $products = $this->model->getAllPro();
        return view('home', [
            'products' => $products
        ]);
    }

    public function login()
    {
        if (isset($_SESSION['logged_in'])) {
            redirect('');
            exit();
        }
        return view('login');
    }

    public function register()
    {
        if (isset($_SESSION['logged_in'])) {
            redirect('');
            exit();
        }
        return view('register');
    }


}
