<?php

require_once '../../model/Student.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$student = new Student();

$student->id = intval($_GET['id']);
$student->name = trim(strval($_POST['name']));
$student->gender = trim(strval($_POST['gender']));
$student->phone = trim(strval($_POST['phone']));
$student->file = $_FILES['photo'] ?? null;


echo $student->update();