<?php

namespace Core;

class Request
{
    public static function uri()
    {
        $uri = str_replace(Request::getFolderName(), '', $_SERVER['REQUEST_URI']);  

        return $uri;
    }

    public static function getFolderName()
    {
        $folder_name = str_replace('index.php', '', $_SERVER['PHP_SELF']);

        return $folder_name;
    }

    public static function method()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        return $method;
    }
}