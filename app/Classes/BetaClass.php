<?php
namespace App\Classes;
class BetaClass
{
    private Request $class;

    public function __construct(Request $request)
    {
        $this->class = $request;
    }
}