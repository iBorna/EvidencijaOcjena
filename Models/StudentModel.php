<?php

namespace Models;
use PDO;

class StudentModel
{
    private $conn;
    private $table="studenti";

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function dohvati() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        }
        return [];
    }

    public function dodaj($ime, $prezime) {
        $query = "INSERT INTO " . $this -> table . " (ime, prezime) VALUES (:ime, :prezime)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ime', $ime);
        $stmt->bindParam(':prezime', $prezime);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ime($studenti_id) {
        $query = "SELECT ime FROM " . $this->table . " WHERE id = :studenti_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':studenti_id', $studenti_id);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['ime'];
            }
        }

        return false;
    }

    public function prezime($studenti_id) {
        $query = "SELECT prezime FROM " . $this->table . " WHERE id = :studenti_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':studenti_id', $studenti_id);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['prezime'];
            }
        }

        return false;
    }

    public function ukloni($student_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}