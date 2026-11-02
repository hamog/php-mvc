<?php

use Core\Libraries\Database;

const BASE_DIR = __DIR__;
require_once BASE_DIR . '/core/bootstrap.php';

//try {
//    $db = new Database();
//    //$db->update('posts', ['title' => 'عنوان ویرایش شده'], 'id = 1');
//  //$db->insert('posts', []);
////    $db->delete('posts' , 'id = 3');
//    $posts = $db->select('select * from posts');
//
//    foreach ($posts as $post) {
//        echo "<p>عنوان: " . $post['title'] . "</p>";
//        echo "<p>متن خبر: " . $post['body'] . "</p>";
//        echo "<p>تاریخ ثبت: " . $post['created_at'] . "</p>";
//    }
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
