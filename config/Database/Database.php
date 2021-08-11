<?php

namespace config\Database;

use PDO;
use PDOException;

class Database
{
    /**
     * Database connection stats
     */
    private $host = "localhost";
    private $db_name = "subscriber";
    private $username = "root";
    private $password = "";
    public $db;

    public function getConnection()
    {
        $this->db = null;
        try {
            $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->db;
    }
}