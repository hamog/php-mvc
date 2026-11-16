<?php

namespace Core\Libraries;

abstract class Model
{
    protected string $table;

    protected Database $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database;
    }

    abstract public function query(string $sql);
}