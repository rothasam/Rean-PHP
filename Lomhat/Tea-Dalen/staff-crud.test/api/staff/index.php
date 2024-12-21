<?php
header('Content-Type: application/json');

if(!file_exists('../../storage/data/staff.json')){
    echo json_encode([
        // 'result' => false,
        // 'message' => 'Staff data not found.'
        'staffs' => [],
        'total_salary' => 0
    ]);
    exit();
}
$staffs = json_decode(file_get_contents('../../storage/data/staff.json'),true); 


$salaries = array_column($staffs,'salary');  // select all column salary
$total = array_sum($salaries); // calculate total salary


echo json_encode([
    'staffs' => $staffs,
    'total_salary' => $total
]);
