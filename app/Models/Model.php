<?php

namespace App\Models;

use Core\Libraries\Database;

abstract class Model
{
    protected string $table;

    protected Database $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database;
    }
}