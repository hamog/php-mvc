<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\HomeController;

return [
    'GET' => [
        '/' => [HomeController::class, 'index'],
        '/hello/([a-z]+)' => [HomeController::class, 'sayHello'],

        '/categories' => [CategoryController::class, 'index'],
    ],
    'POST' => [

    ]
];
