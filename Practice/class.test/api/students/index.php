<?php

require '../../model/Student.php';

header('Content-Type: application/json');

$student = new Student();

echo $student->index();