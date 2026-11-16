<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use Core\Libraries\Controller;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(): void
    {
        $categories = $this->category->getAll();

        $this->view('admin.category.index', ['categories' => $categories]);
    }

    public function create(): void
    {
        $this->view('admin.category.create');
    }

    public function store($inputs): void
    {
        $errors = [];
        if (isset($inputs['name'])) {
            $errors['name'] = 'نام دسته بندی را وارد کنید.';
        }
        if (count($errors) > 0) {
            $this->redirect('/categories/create', ['errors' => $errors]);
        }
        $inputs['created_at'] = date("Y-m-d H:i:s");
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;
        $this->category->insert($inputs);

        $this->success('دسته بندی با موفقیت ثبت شد.');
        $this->redirect('/categories');
    }

    public function edit(int $id): void
    {
        $query = $this->category->query('SELECT * FROM categories WHERE id = ' . $id);
        $category = $query->fetch();

        $this->view('admin.category.edit', ['category' => $category]);
    }
    
    public function update($inputs, $id): void
    {
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;
        $this->category->update($inputs, $id);

        $this->success('دسته بندی با موفقیت به روزرسانی شد.');
        $this->redirect('/categories');
    }

    public function delete($id): void
    {
        $this->category->delete($id);

        $this->success('دسته بندی با موفقیت حذف شد.');
        $this->redirect('/categories');
    }
}