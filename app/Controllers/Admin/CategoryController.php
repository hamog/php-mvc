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

        $this->view('admin.category.index', ['categories' => $categories], 'admin');
    }

    public function create(): void
    {
        $this->view('admin.category.create', [], 'admin');
    }

    public function store(array $inputs): void
    {
        //validation
        $name = trim($inputs['name'] ?? '');
        if ($name === '') {
            $this->redirect('/categories/create', [
                'errors' => ['name' => 'نام دسته‌بندی را وارد کنید!']
            ]);
            return;
        }

        $inputs['name'] = $name;
        $inputs['created_at'] = date('Y-m-d H:i:s');
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;

        $this->category->insert($inputs);

        $this->redirect('/categories', [
            'success' => 'دسته‌بندی با موفقیت ثبت شد.'
        ]);
    }

    public function edit(int $id): void
    {
        $query = $this->category->query('SELECT * FROM categories WHERE id = ' . $id);
        $category = $query->fetch();
        if (!$category) {
            $this->redirect('/categories', [
                'error' => 'دسته بندی انتخاب شده پیدا نشد!'
            ]);
            return;
        }

        $this->view('admin.category.edit', ['category' => $category], 'admin');
    }
    
    public function update(array $inputs, int $id): void
    {
        $inputs['status'] = isset($inputs['status']) ? 1 : 0;
        $this->category->update($inputs, $id);

        $this->redirect('/categories', [
            'success' => 'دسته بندی با موفقیت به روزرسانی شد.'
        ]);
    }

    public function delete(array $inputs, int $id): void
    {
        $this->category->delete($id);

        $this->redirect('/categories', [
            'success' => 'دسته بندی با موفقیت حذف شد.'
        ]);
    }
}