<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>پنل مدیریت | داشبورد</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/admin/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/plugins/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/main.css">
</head>
<body class="admin-body">
<nav class="navbar navbar-expand-lg navbar-dark topbar">
    <a class="navbar-brand font-weight-bold" href="#">مدیریت‌یار</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topMenu" aria-controls="topMenu" aria-expanded="false" aria-label="نمایش منو">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="topMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>">مشاهده سایت</a></li>
            <li class="nav-item"><a class="nav-link" href="login.html">خروج</a></li>
        </ul>
        <span class="navbar-text">سلام، مدیر سیستم</span>
    </div>
</nav>

<div class="admin-layout">
    <aside class="sidebar">
        <div class="sidebar-user">
            <div class="avatar">م</div>
            <div><strong>مدیر سیستم</strong><small>مدیر کل</small></div>
        </div>
        <div class="sidebar-heading">منوی اصلی</div>
        <a class="side-link<?php if ($_SERVER['REQUEST_URI'] == '/php-mvc/dashboard'): ?> active<?php endif; ?>" href="<?= BASE_URL ?>/dashboard"><span class="side-icon">▦</span> داشبورد</a>
        <a class="side-link<?php if ($_SERVER['REQUEST_URI'] == '/php-mvc/categories'): ?> active<?php endif; ?>" href="<?= BASE_URL ?>/categories"><span class="side-icon">▧</span> دسته‌بندی‌ها</a>
        <a class="side-link<?php if ($_SERVER['REQUEST_URI'] == '/php-mvc/posts'): ?> active<?php endif; ?>" href="<?= BASE_URL ?>/categories"><span class="side-icon">▧</span> مقالات</a>
        <a class="side-link<?php if ($_SERVER['REQUEST_URI'] == '/php-mvc/logout'): ?> active<?php endif; ?>" href="<?= BASE_URL ?>"><span class="side-icon">⇥</span> خروج</a>
    </aside>

    <main class="main-content">



