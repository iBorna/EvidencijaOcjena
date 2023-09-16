<?php
namespace Controllers;

use Models\OcjeneModel;
use Models\StudentModel;

require_once(__DIR__ . '/../AutoLoader.php');

class StudentController
{
    private $db;
    private $studentiModel;
    private $ocjeneModel;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->connect();
        $this->studentiModel = new StudentModel( $this->db );
        $this->ocjeneModel = new OcjeneModel( $this->db );
    }

    public function prikazi($student_id = null) {
        if($student_id) {
            $ocjene = $this -> ocjeneModel -> dohvati($student_id);
            $ime = $this -> studentiModel -> ime($student_id);
            if(!$ime) {
                echo "Student ne postoji!";
                exit;
            }
            $prezime = $this -> studentiModel -> prezime($student_id);
            include('Views/ocjene.php');
        } else {
            $studenti = $this -> studentiModel -> dohvati();
            include('Views/studenti.php');
        }

    }

    public function control() {

        //DODAJ STUDENTA
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];

            if ($this->studentiModel->dodaj($ime, $prezime)) {
                header("Location: ../");
            } else {
                echo "Greška prilikom dodavanja studenta!";
            }
        }

        //UKLONI STUDENTA
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) ) {
            $student_id = $_POST['student_id'];

            if ($this->studentiModel->ukloni($student_id)) {
                header("Location: ../");
            } else {
                echo "Greška prilikom uklanjanja studenta!";
            }
        }
    }
}

$controller = new StudentController();
$controller -> control();