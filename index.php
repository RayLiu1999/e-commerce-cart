<?php
session_start();


require __DIR__.'/vendor/autoload.php';

require_once __DIR__.'/Bootstrap.php';

function view($name, $data = [])
{
    extract($data);

    return require __DIR__."/app/views/{$name}.view.php";
}

function redirect($path)
{
    return header("Location: /ecommerce/${path}");
}

require __DIR__.'/app/routes.php';