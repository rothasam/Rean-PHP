<?php

require_once '../../model/Teacher.php';
header('Content-Type:application/json');

$teacher = new Teacher();
$teacher->id = $_GET['id'];
echo $teacher->destroy();