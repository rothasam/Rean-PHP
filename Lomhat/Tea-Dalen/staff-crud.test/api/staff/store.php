<?php 

header('Content-Type: application/json');  // every echo above will print into json

$name = strval($_POST['name']);
$position = strval($_POST['position']);
$salary = floatval($_POST['salary']);
$photo = $_FILES['photo'];

if(!is_dir('../../storage')){
    mkdir('../../storage');
}

if(!is_dir('../../storage/photo')){
    mkdir('../../storage/photo');
}

if(!is_dir('../../storage/data')){
    mkdir('../../storage/data');
}

// if($photo['type'] != 'image/jpeg' && $photo['type'] != 'image/png' && !='application/pdf'){
//     echo json_encode([
//         'result'=> false,
//         'message' => 'Only accept JPEG or PNG format and PDF.'
//     ]);
//     exit(); // stop the script here
// }

print_r($photo); 
if($photo['size'] > (1048576*2)){ // 1048576
    echo json_encode([
        'result'=> false,
        'message' => 'File too large, maximum size is 1MB.'
    ]);
    exit(); // stop the script here
}

// $arr = ['image/jped','image/png','image/jpg'];
// if(!in_array($photo['type'],$arr)){
//     echo json_encode([
//         'result'=> false,
//         'message' => 'Only accept JPEG/PNG/JPG.'
//     ]);
//     exit(); // stop the script here
// }

$path = pathinfo($photo['name']);
$filename = uniqid() . '.' . $path['extension'];
copy($photo['tmp_name'],'../../storage/photo/' . $filename);

$staffs = [];
$id = 1; // default
if(file_exists(('../../storage/data/staff.json'))){
   $staffs = json_decode(file_get_contents('../../storage/data/staff.json'),true);
    $ids = array_column($staffs,'id');  // count all id 
    $id = max($ids) + 1; // find largest id
}

$staffs[] = [
    'id' => $id,
    'name' => $name,
    'position' => $position,
   'salary' => $salary,
    'photo' => $filename
];
// array_push($staffs, [
//     'id' => null,
//     'name' => $name,
//     'position' => $position,
//    'salary' => $salary,
//    'photo' => $filename
// ]);

file_put_contents('../../storage/data/staff.json',json_encode($staffs));


echo json_encode([
    'result'=> true,
    'message' => 'Save successfully.'
]);

?>