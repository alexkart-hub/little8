<?php

namespace App\Controllers;

use App\Classes\Request;

class HomeController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $this->view('home');
    }

    public function info()
    {
        $this->view('info');
    }
}