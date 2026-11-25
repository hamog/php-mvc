<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\PostController;
use App\Controllers\HomeController;

return [
    'GET' => [
        /******** site get routes ********/
        '/' => [HomeController::class, 'index'],

        /******  admin get routes *******/
        '/dashboard' => [DashboardController::class, 'index'],
        //categories
        '/categories' => [CategoryController::class, 'index'],
        '/categories/create' => [CategoryController::class, 'create'],
        '/categories/edit/([0-9]+)' => [CategoryController::class, 'edit'],
        //posts
        '/posts' => [PostController::class, 'index'],
        '/posts/create' => [PostController::class, 'create'],
        '/posts/edit/([0-9]+)' => [PostController::class, 'edit'],
    ],
    'POST' => [
        /******** site post routes ********/

        /******  admin post routes *******/
        //categories
        '/categories/store' => [CategoryController::class, 'store'],
        '/categories/update/([0-9]+)' => [CategoryController::class, 'update'],
        '/categories/delete/([0-9]+)' => [CategoryController::class, 'delete'],
        //posts
        '/posts/store' => [PostController::class, 'store'],
        '/posts/update/([0-9]+)' => [PostController::class, 'update'],
        '/posts/delete/([0-9]+)' => [PostController::class, 'delete'],
    ]
];
