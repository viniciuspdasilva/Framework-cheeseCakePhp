<?php

    require_once __DIR__."/../vendor/autoload.php";
    error_reporting(1);
    ini_set('display_errors', 1);

    $routes = require_once __DIR__."/../app/routes.php";
    $route = new Core\Routes($routes);
?>