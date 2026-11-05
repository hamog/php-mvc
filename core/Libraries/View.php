<?php

namespace Core\Libraries;

class View
{
    public function render(string $view, array $data = []): void
    {
        $viewFile = str_replace('.', '/', $view) . '.php';

        extract($data, EXTR_SKIP);
        require BASE_DIR . '/app/Views/layouts/header.php';
        require BASE_DIR . '/app/Views/' . $viewFile;
        require BASE_DIR . '/app/Views/layouts/footer.php';
    }
}