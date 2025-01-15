<?php

require_once '../../model/Student.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$student = new Student();

if($student->file = $_FILES['photo'] ?? null){
    if($student->file['size'] > 5 * 1024 * 1024){  // 5MB
        echo json_encode([
            'result' => false,
            'message' => 'File size is too large'
        ]);
        exit();        
    }
    if(!in_array($student->file['type'], ['image/jpeg', 'image/png', 'image/jpg','image/webp','image/svg','image/gif'])){
        $path = pathinfo($student->file['name']);
        echo json_encode([
            'result'=> false,
            'message' => 'Wrong type of file!! You submitted .' . $path['extension'] . ' extension'
        ]);
        exit(); 
    }
    $student->name = trim(strval($_POST['name']));
    $student->gender = trim(strval($_POST['gender']));
    $student->phone = trim(strval($_POST['phone']));
    // $student->file = isset($_FILES['photo'] ? $_FILES['photo'] : null);
    $student->file = $_FILES['photo'] ?? null;  // ?? : same as isset() 
            
    echo $student->store();
}




