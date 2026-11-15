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

    public function index() 
    {
        $categories = $this->category->getAll();

        $this->view('admin.category.index', ['categories' => $categories]);
    }

    public function create() 
    {
        $this->view('admin.category.create');
    }

    public function store($inputs) 
    {
        $this->category->insert($inputs);

        $this->success('دسته بندی با موفقیت ثبت شد.');
        $this->redirect('/categories');
    }
    
    public function update($inputs, $id) 
    {
        $category = $this->category->find($id);

        $this->category->update($inputs, );

        $this->success('دسته بندی با موفقیت ثبت شد.');
        $this->view('admin.category.index');
    }

    public function destroy($id) 
    {
        $category = $this->category->find($id);
        
        $this->category->delete($category->id);

        $this->success('دسته بندی با موفقیت ثبت شد.');
        $this->view('admin.category.index');
    }
}