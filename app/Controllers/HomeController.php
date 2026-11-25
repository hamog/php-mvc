<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Libraries\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $post = new Post();
        $query = $post->query("SELECT posts.*, categories.name as category_name 
            FROM posts LEFT JOIN categories ON categories.id = posts.category_id 
            ORDER BY created_at DESC 
            LIMIT 3");
        $posts = $query->fetchAll();

        $this->view('home.index', ['posts' => $posts]);
    }
}