<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\HomeController;

return [
    'GET' => [
        '/' => [HomeController::class, 'index'],

        '/categories' => [CategoryController::class, 'index'],
        '/categories/create' => [CategoryController::class, 'create'],
        '/categories/edit/([0-9]+)' => [CategoryController::class, 'edit'],
        '/categories/delete/([0-9]+)' => [CategoryController::class, 'delete'],
    ],
    'POST' => [
        '/categories/store' => [CategoryController::class, 'store'],
        '/categories/update/([0-9]+)' => [CategoryController::class, 'update'],
    ]
];
