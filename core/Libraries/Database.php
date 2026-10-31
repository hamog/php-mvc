<?php

namespace Core\Libraries;

use PDO;
class Database extends PDO 
{
    private string $servername = 'localhost';
    private string $dbname = 'mvc_db';
    private string $username = 'root';
    private string $password = '***********'; //replace your database password


    public function __construct()
    {
        parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // set the PDO fetch method
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function select(string $sql, array $data = [], int $fetchMode = self::FETCH_ASSOC): array
    {
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $stmt->fetchAll($fetchMode);
    }
}