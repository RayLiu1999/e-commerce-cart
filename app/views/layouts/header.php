<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>購物車作品</title>
    <style>
        .container {
            position: relative;
        }

        .alert.alert-success {
            position: sticky;
            top: 60px;
            z-index: 100;
        }
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark">
        <div class="container">
            <span class="material-icons" style="color:white">
                shopping_cart
            </span>
            <a class="navbar-brand" href="/ecommerce">CART</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/ecommerce">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ecommerce/cart">購物車</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (!isset($_SESSION['logged_in'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/ecommerce/login">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ecommerce/register">註冊</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/ecommerce/logout">登出</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body style="min-height: 100vh;display: flex;flex-direction: column;">