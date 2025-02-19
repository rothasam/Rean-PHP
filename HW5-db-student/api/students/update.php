<?php

require_once './../../bootstrap.php';

$db= new Database();
$id = intval($_GET['id']);

if ($id <= 0) {
    echo json_encode([
        'result' => false,
        'message' => 'Invalid student ID.'
    ]);
    exit;
}

$sqlCheckId = 'SELECT COUNT(*) FROM students WHERE id = :id';
$isExist = $db->fetchColumn($sqlCheckId, ['id' => $id]);

if(!$isExist){
    echo json_encode([
        'result' => false,
        'message' => 'Student not found.',
    ]);
    exit;
}

$first_name = isset($_POST['first_name']) ? strval($_POST['first_name']) : null;
$last_name = isset($_POST['last_name']) ? strval($_POST['last_name']) : null;
$gender = isset($_POST['gender']) ? intval($_POST['gender']) : null;
$dob = isset($_POST['dob']) ? strval($_POST['dob']) : null;

$updateField = [];
$params = [];


if(!empty($first_name)){
    $updateField[] = 'first_name = :first_name';
    $params['first_name'] = $first_name;
}

if(!empty($last_name)){
    $updateField[] = 'last_name = :last_name';
    $params['last_name'] = $last_name;
}

if(!empty($gender)){
    $updateField[] = 'gender = :gender';
    $params['gender'] = $gender;
}

if(!empty($dob)){
    $updateField[] = 'dob = :dob';
    $params['dob'] = $dob;
}

if(count($updateField) > 0){
    $sql = 'UPDATE students SET '. implode(', ', $updateField).' WHERE id = :id';
    $params['id'] = $id;
    $db->execute($sql, $params);
    echo json_encode([
        'result' => true,
        'message' => 'Update student successfully.'
    ]);
}else{
    echo json_encode([
        'result' => false,
        'message' => 'No field to update.'
    ]);
}

