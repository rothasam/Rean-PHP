<?php

require_once '../../model/Student.php';

header('Content-Type: application/json');

$studnet = new Student();
echo $studnet->index();
