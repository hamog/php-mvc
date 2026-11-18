<?php

namespace Core\Libraries;

class View
{
    public function render(string $view, array $data = [], string $layout = 'site'): void
    {
        $viewFile = str_replace('.', '/', $view) . '.php';

        extract($data, EXTR_SKIP);
        require BASE_DIR . '/app/Views/layouts/' . $layout . '/header.php';
        require BASE_DIR . '/app/Views/' . $viewFile;
        require BASE_DIR . '/app/Views/layouts/' . $layout . '/footer.php';
    }
}