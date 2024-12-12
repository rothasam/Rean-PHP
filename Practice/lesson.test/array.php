<?php 

    # there are 2 ways to declare array : using function() and using short-hand syntax
    $arr = array(); 
    $arr = ['rotha','sam']; # index or single array

    #update array
    $arr[0] = 'mak tha';
    for($i=0;$i<count($arr);$i++){
        echo $arr[$i];
        echo "</br>";
    }

    $arr_object = ['name' => 'rotha', 'age' => 21 , 'from' => 'KH']; // array object or associative array
    $arr_2D = [ // store multiple array
        ['name' => 'rotha', 'age' => 21 , 'from' => 'KH'],
        ['name' => 'hello', 'age' => 21 , 'from' => 'KH'],
        ['name' => 'world', 'age' => 21 , 'from' => 'KH'],
        ['name' => 'hey', 'age' => 21 , 'from' => 'KH']
    ];

    foreach($arr_2D as $item){
        if(in_array('hey',$item)){
            $item['name'] = '55555';
        }
        echo ' -> Your name is '. $item['name'].' and you are '. $item['age'] . ' from '. $item['from'] . '<br>'; 
    }


    // push array 
    echo "</br>";
    array_push($arr,'thunh nas');
    // for($i=0;$i<count($arr);$i++){
    //     echo $arr[$i];
    //     echo "</br>";
    // }
    
    print_r($arr);
    echo "</br></br>";
    
    unset($arr[0]);
    print_r($arr);

    // foreach($arr_2D as $item){
    //     echo "<br>";
    //     if($item['name'] )
    // }

    // echo $arr[0];  # rotha
    echo "</br>";
    echo 'Your name is ' . $arr_object['name'] . ' and you are ' . $arr_object['age'];   #  this is how to access array object
    foreach($arr_2D as $item){
        echo "</br>";
        echo "</br>";
        echo 'Your name is '. $item['name'].' and you are '. $item['age'] . ' from '. $item['from'];  
    }

    $arr_num = [
        [1,2,3], 
        [33,44,11],
        [5,66,12]
    ];
    echo '</br>';
    foreach($arr_num as $item){
        foreach($item as $num){
            echo '</br>';
            echo $num;
        }
    }



    // echo $arr_2D[0]['name'];


    // ot der phg
    // for($i=0; $i<count($arr_2D); $i++){
    //     echo '</br>';
    //     for($j=0; $j<count($arr_2D[$i]) ; $j++){
    //         echo $arr_2D[$i]['name'];
    //     }
    // }





// // Flatten the array
// $flat_array = array_merge(...$arr_num);

// // Iterate through the 1D array
// foreach ($flat_array as $num) {
//     echo '</br>';
//     echo $num;
// }

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    
</body>
</html> -->