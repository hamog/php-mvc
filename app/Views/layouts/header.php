<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? \Core\Libraries\Config::get('app_name') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/plugins/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/main.css">
</head>
<body>
<!-- منو -->
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html"><?= \Core\Libraries\Config::get('app_name') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-label="منو">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="index.html">صفحه اصلی</a></li>
                <li class="nav-item"><a class="nav-link" href="articles.html">همه مقالات</a></li>
            </ul>
            <form class="form-inline mr-md-auto my-2 my-md-0" action="articles.html" method="get">
                <div class="input-group input-group-sm">
                    <input class="form-control" type="search" name="q" placeholder="جستجو در مقالات..."
                           aria-label="جستجو">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">جستجو</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<div class="container">


