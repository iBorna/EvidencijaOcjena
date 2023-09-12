<?php

namespace Models;

use PDO;

class OcjeneModel
{
    private $conn;
    private $table="ocjene";

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function dohvati($student_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE studenti_id = :student_id ORDER BY predmet ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function dodaj($predmet, $ocjena, $student_id) {
        $query = "INSERT INTO " . $this -> table . " (predmet, ocjena, studenti_id) VALUES (:predmet, :ocjena, :studenti_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':predmet', $predmet);
        $stmt->bindParam(':ocjena', $ocjena);
        $stmt->bindParam(':studenti_id', $student_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function ukloni($ocjena_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :ocjena_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ocjena_id', $ocjena_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}