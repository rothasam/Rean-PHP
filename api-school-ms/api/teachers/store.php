<?php

require_once '../../model/Teacher.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');



$teacher = new Teacher();
$teacher->name = trim(strval($_POST['name']));
        $teacher->gender = trim(strval($_POST['gender']));
        $teacher->email = trim(strval($_POST['email']));
        $teacher->salary = floatval($_POST['salary']);
        $teacher->file = $_FILES['photo'] ?? null;

        echo $teacher->store();
// if($teacher->file = $_FILES['photo'] ?? null){
//     if($teacher->file['size'] > 5 * 1024 * 1024){  // 5MB
//         echo json_encode([
//             'result' => false,
//             'message' => 'File size is too large'
//         ]);
//         exit();        
//     }
//     if(!in_array($teacher->file['type'], ['image/jpeg', 'image/png', 'image/jpg','image/webp','image/svg','image/gif'])){
//         $path = pathinfo($teacher->file['name']);
//         echo json_encode([
//             'result'=> false,
//             'message' => 'Wrong type of file!! You submitted .' . $path['extension'] . ' extension'
//         ]);
//         exit(); 
//     }
//     // if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['position']) && isset($_POST['salary'])){
//         $teacher->name = trim(strval($_POST['name']));
//         $teacher->gender = trim(strval($_POST['gender']));
//         $teacher->email = trim(strval($_POST['email']));
//         $teacher->salary = floatval($_POST['salary']);
//         $teacher->file = $_FILES['photo'] ?? null;
//         echo $teacher->store();
//     // }
// }





    