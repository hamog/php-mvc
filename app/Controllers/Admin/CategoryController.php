<?php

namespace App\Controllers\Admin;

use Core\Libraries\Controller;

class CategoryController extends Controller
{
    public function index() 
    {
        $this->view('admin.category.index');
    }
    
}