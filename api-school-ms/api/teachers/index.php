<?php

require_once '../../model/Teacher.php';
header('Content-Type: application/json');

$teacher = new Teacher();
echo $teacher->index(); 