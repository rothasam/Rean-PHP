<?php
    $selectedId = $_GET['id'];
    $staffs = json_decode(file_get_contents('../../storage/data/staff.json'),true);

    // $arr = ['rotha','seth','sal','haha'];
    // $newArr = array_slice($arr,2,1);
    // print_r($newArr);
    foreach($staffs as $index => $item){
        if($item['id'] == $selectedId){
            $photoPath = '../../storage/photo/' . $item['photo'];
            if(file_exists($photoPath)){
                unlink($photoPath);
            }
            array_splice($staffs,$index,1);
            // unset($staffs[$index]);
        }
    }
    
    array_values($staffs);
    if(count($staffs) == 0 ){
        unlink('../../storage/data/staff.json');
    }else{
        file_put_contents('../../storage/data/staff.json',json_encode($staffs));
    }

    echo json_encode([
        'result' => true,
        'message' => 'Delete successfully.'
    ]);
    