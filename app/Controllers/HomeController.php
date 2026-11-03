<?php

namespace App\Controllers;

use Core\Libraries\View;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home.index');
    }

    public function sayHello(string $name): void
    {
        $this->view('home.hello', ['name' => $name]);
    }
}