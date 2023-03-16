<?php

namespace App;

class Instances
{
    public static final function get(): array
    {
        return [
            'queryParams' => $_GET,
            'postParams' => $_POST,
            'serverParams' => $_SERVER,
        ];
    }
}