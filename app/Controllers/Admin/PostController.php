<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Core\Libraries\Controller;

class PostController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    private function getAllCategories(): array
    {
        $category = new Category();
        return $category->getAll();
    }

    public function index(): void
    {
        $posts = $this->post->getAll();

        $this->view('admin.post.index', ['posts' => $posts], 'admin');
    }

    public function create(): void
    {
        $categories = $this->getAllCategories();

        $this->view('admin.post.create', ['categories' => $categories], 'admin');
    }

    public function store(array $inputs): void
    {
        //validation
        $title = trim($inputs['title'] ?? '');
        if ($title === '') {
            $this->redirect('/posts/create', [
                'errors' => ['name' => 'عنوان مقاله را وارد کنید!']
            ]);
            return;
        }

        $inputs['title'] = $title;
        $inputs['created_at'] = date('Y-m-d H:i:s');
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;

        $this->post->insert($inputs);

        $this->redirect('/posts', [
            'success' => 'مقاله با موفقیت ثبت شد.'
        ]);
    }

    public function edit(int $id): void
    {
        $query = $this->post->query('SELECT posts.*, categories.name as category_name 
                    FROM `posts` 
                    LEFT JOIN categories ON categories.id = posts.category_id
                    WHERE posts.id=' . $id);
        $post = $query->fetch();
        if (!$post) {
            $this->redirect('/posts', [
                'error' => 'مقاله انتخاب شده پیدا نشد!'
            ]);
            return;
        }
        $categories = $this->getAllCategories();

        $this->view('admin.post.edit', ['post' => $post, 'categories' => $categories], 'admin');
    }
    
    public function update(array $inputs, int $id): void
    {
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;
        $this->post->update($inputs, $id);

        $this->redirect('/posts', [
            'success' => 'مقاله با موفقیت به روزرسانی شد.'
        ]);
    }

    public function delete(array $inputs, int $id): void
    {
        $this->post->delete($id);

        $this->redirect('/posts', [
            'success' => 'مقاله با موفقیت حذف شد.'
        ]);
    }
}