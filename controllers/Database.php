<?php

namespace Controllers;
use PDO;
use PDOException;

class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function connect()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db_name = 'evidencija';

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Greška prilikom spajanja na bazu.";
        }

        return $this->conn;
    }
}

?>