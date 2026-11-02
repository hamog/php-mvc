<?php

namespace Core\Libraries;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require_once BASE_DIR . '/routes/web.php';
    }

    public function resolve(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $path = $this->getPath();

        // بررسی وجود متد HTTP
        if (!isset($this->routes[$method])) {
            $this->notFound();
            return;
        }

        // بررسی مسیرهای تعریف شده
        foreach ($this->routes[$method] as $route => $action) {

            if (preg_match("#^{$route}$#", $path, $matches)) {

                $param = $matches[1] ?? null;

                $controller = new $action[0];

                if ($method === 'POST') {
                    $controller->{$action[1]}($param, $_POST);
                } else {
                    $controller->{$action[1]}($param);
                }

                return;
            }
        }

        // اگر هیچ مسیری پیدا نشد
        $this->notFound();
    }

    private function getPath(): string
    {
        $basePath = Config::get('base_path');

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        return str_replace($basePath, '', $path);
    }

    private function notFound(): void
    {
        http_response_code(404);

        require BASE_DIR . '/app/Views/errors/404.php';
    }
}