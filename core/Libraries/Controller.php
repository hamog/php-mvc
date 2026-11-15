<?php

namespace Core\Libraries;

abstract class Controller
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function view(string $template, array $data = []): void
    {
        $this->view->render($template, $data);
    }

    protected function success(string $notification): void
    {
        $_SESSION['success'] = $notification;
    }

    protected function error(string $notification): void
    {
        $_SESSION['error'] = $notification;
    }

    protected function redirect(string $url): void
    {
        header('Location:' . BASE_URL . $url);
    }
}