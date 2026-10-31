<?php

namespace Core\Libraries;

use PDO;
use PDOException;

class Database extends PDO 
{
    private string|null|PDO $conn = null;
    private string $servername = 'localhost';
    private string $dbname = 'mvc_db';
    private string $username = 'root';
    private string $password = 'Shetab@2023';


    public function __construct()
    {
        try {
            $this->conn = parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn .= parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn .= parent::setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            $this->conn = null;
            echo "Connection failed: " . $e->getMessage();
        }
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

    public function __destruct()
    {
        $this->conn = null;
    }
}