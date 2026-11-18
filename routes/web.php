<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\HomeController;

return [
    'GET' => [
        //site get routes
        '/' => [HomeController::class, 'index'],

        //admin get routes
        '/dashboard' => [DashboardController::class, 'index'],
        '/categories' => [CategoryController::class, 'index'],
        '/categories/create' => [CategoryController::class, 'create'],
        '/categories/edit/([0-9]+)' => [CategoryController::class, 'edit'],
    ],
    'POST' => [
        //site post routes

        //admin post routes
        '/categories/store' => [CategoryController::class, 'store'],
        '/categories/update/([0-9]+)' => [CategoryController::class, 'update'],
        '/categories/delete/([0-9]+)' => [CategoryController::class, 'delete'],
    ]
];
