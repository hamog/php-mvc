<?php

namespace App\Controllers;

use Core\Libraries\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home.index');
    }
}