<?php

use App\Classes\Request;

$request = new Request($_GET, $_POST, $_SERVER);
(new \App\Router())->match($request->getServerParams()['REQUEST_URI']);