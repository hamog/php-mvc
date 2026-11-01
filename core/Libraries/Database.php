<?php

namespace Core\Libraries;

use InvalidArgumentException;
use PDO;

class Database extends PDO
{
    public function __construct()
    {
        $serverName = Config::get('db_server');
        $dbName = Config::get('db_name');
        $username = Config::get('db_username');
        $password = Config::get('db_password');
        $charset = Config::get('db_charset', 'utf8mb4');

        parent::__construct("mysql:host=$serverName;dbname=$dbName;charset=$charset", $username, $password);
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