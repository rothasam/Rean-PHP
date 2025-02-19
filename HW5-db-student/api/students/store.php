<?php

require_once './../../bootstrap.php';

$db = new Database();
$first_name = strval($_POST['first_name']);
$last_name = strval($_POST['last_name']);
$gender = intval($_POST['gender']);
$dob = strval($_POST['dob']);
$register_at = strval($_POST['register_at']);

$sql = 'INSERT INTO students (first_name, last_name, gender, dob, register_at) 
        VALUES (:first_name, :last_name, :gender, :dob, :register_at)';
$params = [
    'first_name' => $first_name,
    'last_name' => $last_name,
    'gender' => $gender,
    'dob' => $dob,
    'register_at' => $register_at, 
];

$db->execute($sql,$params);

echo json_encode([
    'result' => true,
   'message' => 'Insert student successfully.'
]);

?>