<?php

require_once '../../model/Student.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$student = new Student();
$student->id = $_GET['id'];
echo $student->destroy();