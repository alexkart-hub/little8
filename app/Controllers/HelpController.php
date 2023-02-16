<?php
namespace App\Controllers;

class HelpController extends Controller
{
    public function index()
    {
        $this->view('help');
    }

    public function maze()
    {
        $this->view('maze');
    }
}