<?php

header('Content-Type: application/json');

$selectedID = intval($_POST['id']);
$name = strval($_POST['name']);
$position = strval($_POST['position']);
$salary = floatval($_POST['salary']);

$photo = null;
if(isset($_FILES['photo'])){
    $photo = $_FILES['photo'];
}


if(!file_exists('../../storage/data/staff.json')){
    echo json_encode([
       'result' => false,
       'message' => 'Staff data not found.'
    ]);
    exit();
}

$fileName = '';
if($photo){
    $path = pathinfo($photo['name']);
    $fileName = uniqid(). '.'. $path['extension'];
    copy($photo['tmp_name'],'../../storage/photo/' . $fileName);
}

$staffs = json_decode(file_get_contents('../../storage/data/staff.json'),true);
foreach($staffs as $index => $item){
    if($item['id'] == $selectedID){
        $staffs[$index]['name'] = $name;
        $staffs[$index]['position'] = $position;
        $staffs[$index]['salary'] = $salary;
        // $staffs[$index]['photo'] = $fileName;
        if($photo){
            $photoPath = '../../storage/photo/' . $item['photo'];
            if($item['photo'] && file_exists($photoPath)){
                unlink($photoPath);
            }
            $staffs[$index]['photo'] = $fileName;
        }
        break;
    }
}

file_put_contents('../../storage/data/staff.json', json_encode($staffs));
echo json_encode([
    'result' => true,
   'message' => 'Update successfully.'
]);