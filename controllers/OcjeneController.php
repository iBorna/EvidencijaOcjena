<?php

namespace Controllers;

use Models\OcjeneModel;
use Models\StudentModel;

require_once(__DIR__ . '/../AutoLoader.php');

class OcjeneController
{
    private $db;
    private $studentiModel;
    private $ocjeneModel;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->connect();
        $this->studentiModel = new StudentModel($this->db);
        $this->ocjeneModel = new OcjeneModel($this->db);
    }

    public function control()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ocjena_id'])) {
            $ocjena_id = $_POST['ocjena_id'];
            $result = $this->ocjeneModel->ukloni($ocjena_id);
            echo $result;
            if ($result) {
                header("Location: ../");
            } else {
                echo "Greška prilikom dodavanje ocjene!";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['predmet']) && isset($_POST['ocjena']) && isset($_POST['student_id'])) {
            $predmet = $_POST['predmet'];
            $ocjena = $_POST['ocjena'];
            $student_id = $_POST['student_id'];

            if ($this->ocjeneModel->dodaj($predmet, $ocjena, $student_id)) {
                header("Location: ../student.php?student_id=" . $student_id);
            } else {
                echo "Greška prilikom dodavanje ocjene!";
            }
        }
    }
}

$controller = new OcjeneController();
$controller -> control();