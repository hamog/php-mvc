<?php

namespace App\Controllers;

use Core\Libraries\View;

class Controller
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function view(string $template, array $data = []): void
    {
        $this->view->render($template, $data);
    }
}