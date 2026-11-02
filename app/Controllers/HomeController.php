<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo 'Home';
    }

    public function sayHello(string $name)
    {
        echo "Hello $name";
    }
}