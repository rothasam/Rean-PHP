<?php

require_once '../../model/Student.php';

header('Content-Type: application/json');

$student = new Student();
$student->id = $_GET['id'];
echo $student->destroy();