<?php

require_once '../../model/Teacher.php';
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');

$teacher = new Teacher();
$teacher->id = $_GET['id'];
echo $teacher->destroy();