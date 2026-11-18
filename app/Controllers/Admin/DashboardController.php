<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use Core\Libraries\Controller;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->view('admin.dashboard.index', [], 'admin');
    }
}