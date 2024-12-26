<?php

// include '../../model/Student.php';
require '../../model/Student.php';


header('Content-Type: application/json');

// $stu = new Student(); 
// $stu->store();

$stu1 = new Student();
// $stu1->name = 'haha';
// $stu1->store();

$stu1->name = $_POST['name'];
$stu1->gender = $_POST['gender'];
$stu1->phone = $_POST['phone'];
$stu1->dob = $_POST['dob'];

echo $stu1->store();




