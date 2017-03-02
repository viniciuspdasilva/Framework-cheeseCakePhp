<?php

    require_once __DIR__."/../vendor/autoload.php";

    $routes = require_once __DIR__."/../app/routes.php";
    $route = new Core\Routes($routes);
?>