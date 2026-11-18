<?php

namespace Core\Libraries;

abstract class Controller
{
    protected function view(string $template, array $data = [], string $layout = 'site'): void
    {
        $view = new View();
        $view->render($template, $data, $layout);
    }

    protected function success(string $notification): void
    {
        $_SESSION['success'] = $notification;
    }

    protected function error(string $notification): void
    {
        $_SESSION['error'] = $notification;
    }

    protected function redirect(string $url, array $message = []): void
    {
        if ($message) {
            $key = key($message);
            $_SESSION[$key] = $message[$key];
        }
        header('Location:' . BASE_URL . $url);
        return;
    }
}