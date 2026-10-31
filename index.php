<?php

use Core\Libraries\Database;

require_once __DIR__ . '/core/bootstrap.php';

$db = new Database();
$posts = $db->select('select * from posts where id = :id', ['id' => 1]);

foreach ($posts as $post) {
    echo "<p>عنوان: ". $post['title'] ."</p>";
    echo "<p>متن خبر: ". $post['body'] ."</p>";
    echo "<p>تاریخ ثبت: ". $post['created_at'] ."</p>";
}