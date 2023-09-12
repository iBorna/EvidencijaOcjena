<?php
require_once 'AutoLoader.php';

use Controllers\StudentController;

$StudentController = new StudentController();
$StudentController -> prikazi($_GET["student_id"]);