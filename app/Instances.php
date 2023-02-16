<?php

namespace App;

use App\Classes\Request;

class Instances
{
    public static final function get(): array
    {
        return [
            'App\Classes\Request' => new Request($_GET, $_POST, $_SERVER),
            'apiKey' => 'request'
        ];
    }
}