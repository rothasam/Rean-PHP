<?php

require_once '../../model/Teacher.php';

header('Content-Type: application/json');

$teacher = new Teacher();

$teacher->name = trim(strval($_POST['name']));
$teacher->gender = trim(strval($_POST['gender']));
$teacher->email = trim(strval($_POST['email']));
$teacher->salary = trim(floatval($_POST['salary']));
$teacher->file = $_FILES['photo'] ?? null;

echo $teacher->store();
