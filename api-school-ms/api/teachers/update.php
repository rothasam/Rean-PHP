<?php

require_once '../../model/Teacher.php';
header('Content-Type: application/json');

$teacher = new Teacher();

if($teacher->file = $_FILES['photo'] ?? null){
    if($teacher->file['size'] > 5 * 1024 * 1024){  // 5MB
        echo json_encode([
            'result' => false,
            'message' => 'File size is too large'
        ]);
        exit();        
    }
    if(!in_array($teacher->file['type'], ['image/jpeg', 'image/png', 'image/jpg','image/webp','image/svg','image/gif'])){
        $path = pathinfo($teacher->file['name']);
        echo json_encode([
            'result'=> false,
            'message' => 'Wrong type of file!! You submitted .' . $path['extension'] . ' extension'
        ]);
        exit(); 
    }

    $teacher->id = intval($_GET['id']);
    $teacher->name = trim(strval($_POST['name']));
    $teacher->gender = trim(strval($_POST['gender']));
    $teacher->email = trim(strval($_POST['email']));
    $teacher->salary = trim(floatval($_POST['salary']));
    $teacher->file = $_FILES['photo'] ?? null;
    echo $teacher->update();
}
