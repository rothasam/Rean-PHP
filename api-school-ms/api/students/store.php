<?php

require '../../model/Student.php';

header('Content-Type: application/json');

$student = new Student();

$student->name = trim(strval($_POST['name']));
$student->gender = trim(strval($_POST['gender']));
$student->phone = trim(strval($_POST['phone']));
// $student->file = isset($_FILES['photo'] ? $_FILES['photo'] : null);
$student->file = $_FILES['photo'] ?? null;  // ?? : same as isset()  

echo $student->store();




