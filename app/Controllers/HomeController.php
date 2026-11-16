<?php

namespace App\Controllers;

use Core\Libraries\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->success('به صفحه اصلی خوش آمدید.');
        $this->view('home.index');
    }
}