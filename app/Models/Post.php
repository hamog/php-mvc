<?php

namespace App\Models;

use Core\Libraries\Model;

class Post extends Model
{
    protected string $table = 'posts';

    public function getAll(): array
    {
        return $this->db->select(
            "SELECT posts.*, categories.name as category_name 
                    FROM `{$this->table}` 
                    LEFT JOIN categories ON categories.id = posts.category_id
                    ORDER BY `created_at` DESC",
            []
        );
    }

    public function query(string $sql)
    {
        return $this->db->query($sql);
    }

    public function insert(array $data): bool
    {
        return $this->db->insert($this->table, $data);
    }

    public function update(array $data, $id): bool
    {
        return $this->db->update($this->table, $data, "id = $id");
    }

    public function delete($id): bool
    {
        return $this->db->delete($this->table, "id = $id");
    }
}