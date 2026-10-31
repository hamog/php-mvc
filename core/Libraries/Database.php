<?php

namespace Core\Libraries;

use InvalidArgumentException;
use PDO;

class Database extends PDO
{
    private string $servername = 'localhost';
    private string $dbname = 'mvc_db';
    private string $username = 'root';
    private string $password = '*********'; //replace your database password
    private string $charset = 'utf8mb4';


    public function __construct()
    {
        parent::__construct("mysql:host=$this->servername;dbname=$this->dbname;charset=$this->charset", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // set the PDO fetch method
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function select(string $sql, array $data = [], int $fetchMode = self::FETCH_ASSOC): array
    {
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $stmt->fetchAll($fetchMode);
    }

    public function insert(string $tableName, array $data): bool
    {
        if (count($data) < 1) {
            throw new InvalidArgumentException('Insert data cannot be empty!');
        }

        ksort($data);
        $fieldKeys = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $stmt = $this->prepare("INSERT INTO `$tableName`(`$fieldKeys`) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        return $stmt->execute();
    }

    public function update(string $table, array $data, string $where): bool
    {
        ksort($data);

        $fieldValues = "";
        foreach ($data as $key => $value) {
            $fieldValues .= " `$key`= :$key, ";
        }
        $fieldValues = rtrim($fieldValues, ', ');

        $stmt = $this->prepare("UPDATE `$table` SET $fieldValues WHERE $where");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete($table, $where): bool
    {
        $stmt = $this->prepare("DELETE FROM `$table` WHERE $where");

        return $stmt->execute();
    }
}