<?php

namespace App\Models;

class Category extends Model
{
    protected string $table = 'categories';

    public function getAll(array $data = []): array
    {
        return $this->db->select("SELECT * FROM {$this->table}", $data);
    }
}