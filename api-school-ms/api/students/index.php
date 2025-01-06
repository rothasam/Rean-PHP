<?php

require_once '../../model/Student.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$studnet = new Student();
echo $studnet->index();
