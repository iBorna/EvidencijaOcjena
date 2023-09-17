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
        //UKLANJANJE OCJENE
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) ) {
            $ocjena_id = $_POST['ocjena_id'];
            $result = $this->ocjeneModel->ukloni($ocjena_id);
            if ($result) {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Greška prilikom brisanja ocjene!";
            }
        }

        //DODAVANJE OCJENE STUDENTU
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add']) ) {
            $predmet = $_POST['predmet'];
            $ocjena = $_POST['ocjena'];
            $student_id = $_POST['student_id'];

            if ($this->ocjeneModel->dodaj($predmet, $ocjena, $student_id)) {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Greška prilikom dodavanje ocjene!";
            }
        }

        // UREĐIVANJE OCJENE
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit']) ) {
            $ocjena_id = $_POST['ocjena_id'];
            $nova_ocjena = $_POST['nova_ocjena'];

            if ($this->ocjeneModel->uredi($ocjena_id, $nova_ocjena)) {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Greška prilikom uređivanja ocjene!";
            }
        }
    }
}

$controller = new OcjeneController();
$controller -> control();