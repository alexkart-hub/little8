<?php

use App\Classes\Request;
use App\Container;
use App\Router;

$container = Container::getInstance();
$router = $container->get(Router::class);
$request = $container->get(Request::class);
$router->match($request->getServerParams()['REQUEST_URI']);