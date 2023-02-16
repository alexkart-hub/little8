<?php

namespace App;

use App\Controllers\HelpController;
use App\Controllers\HomeController;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->setRoutes();
    }

    public function match($url)
    {
        $urlPath = parse_url($url)['path'];
        $container = new Container();
        if (!isset($this->routes[$urlPath])) {
            $this->set404();
            return;
        }
        $route = $this->routes[$urlPath];
        $controller = $container->get($route->class);
        $action = $route->action;
        $controller->$action();
    }

    protected function setRoutes()
    {
        $this->routes = [
            '/' => new Route('/', 'App\Controllers\HomeController'),
            '/info' => new Route('/info', 'App\Controllers\HomeController', 'info'),
            '/help' => new Route('/help', 'App\Controllers\HelpController'),
            '/maze' => new Route('/help', 'App\Controllers\HelpController', 'maze'),
        ];
    }

    protected function set404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        $content_view = '404.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
    }
}

class Route
{
    public $path;
    public $class;
    public $action;

    public function __construct($path, $class, $action = 'index')
    {
        $this->path = $path;
        $this->class = $class;
        $this->action = $action;
    }
}