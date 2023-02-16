<?php

namespace App\Controllers;

abstract class Controller
{
    public function view($name)
    {
        $content_view = $name . '.php';
        if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/views/' . $content_view)) {
            $message = 'Не найден файл ' . $_SERVER['DOCUMENT_ROOT'].'/views/' . $content_view;
            $content_view = '404.php';
        }
        include $_SERVER['DOCUMENT_ROOT'].'/views/layout.php';
    }
}