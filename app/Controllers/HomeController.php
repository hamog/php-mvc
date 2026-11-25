<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Libraries\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $search = $_GET['q'] ?? null;

        $post = new Post();
        $sql = "SELECT posts.*, categories.name AS category_name
        FROM posts
        LEFT JOIN categories ON categories.id = posts.category_id";
        if ($search) {
            $sql .= " WHERE posts.title LIKE '%{$search}%'";
        }
        $sql .= " ORDER BY posts.created_at DESC LIMIT 3";
        $query = $post->query($sql);
        $posts = $query->fetchAll();

        $this->view('home.index', ['posts' => $posts]);
    }
}