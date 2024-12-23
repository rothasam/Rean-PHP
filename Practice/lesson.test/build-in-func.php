<?php

// ARRAY

// array_push()
// array_sum()
// max(), min()
// in_array()
// count()
// array_column()
// sort()
// array_reverse()

// $arr = [5, 3, 8, 1, 9];


// STRING

// $arr = 'hello';
// $str = 'teacher';
// // echo $str . $arr;
// // echo strlen($arr);
// // print_r($arr[0]);

// $name = '   haha jjsidjfsfjs   ';
// echo strlen($name); 
// echo '</br>';
// echo strlen(trim($name));  // cut space around text
// echo strtolower($name);
// echo strtoupper($name);

// $Name = 'Sam rotha';
// echo str_contains($Name,'sam'); // nothing return 
// echo str_contains($Name,'Sam'); // return 1
// echo str_contains(strtolower($Name),'sam'); // return 1
// echo str_starts_with($Name,'rotha'); // nothing
// echo str_starts_with($Name,'Sam'); // return 1
// echo str_ends_with($Name,'rotha'); // return 1

// $str = 'hello world';
// echo str_replace('hello','bye',$str); 
// echo $str; // still hello world
// echo substr($str,5); // remove first 5 characters


// $color = ['Black','Pink','Yellow',];
// echo implode(',',$color);  // convert array to string
// echo implode('/',$color);  //  Output : Black/Pink/Yellow


// $str = 'Chan Rotha, Chan Naritha, Chan Chanthea';
// print_r($str);  // Chan Rotha, Chan Naritha, Chan Chanthea
// $newArr = explode(',',$str);  // string to array
// print_r($newArr);  // Array ( [0] => Chan Rotha [1] => Chan Naritha [2] => Chan Chanthea )


// $arr = [
//     ['id' => 1 , 'name' => 'Chan Rotha'],
//     ['id' => 2 , 'name' => 'Chan Oda'],
//     ['id' => 3 , 'name' => 'Chan Mara'],
//     ['id' => 4 , 'name' => 'Chan Dalen']
// ];
// Expected result : Chan Rotha, Chan Oda, Chan Mara, Chan Dalen

// #1
// $result = array_map(function($item){
//     return $item['name'];
// },$arr);
// echo implode(',',$result); // Chan Rotha, Chan Oda, Chan Mara, Chan Dalen

// #2
// echo 'Name : ' . implode(',',array_column($arr,'name'));



// MATH 

// echo pow(2,3); // 8
// echo sqrt(9); // 3
// echo pow(16,1/4); // 2

// $num = 12.5;
// echo round($num);
$num1 = 12.456;
$num2 = -12.77;
// echo round($num1,1); //12.5
// echo round($num1,2); // 12.46
// echo ceil($num1); // 13
// echo floor($num1); // 12

// echo abs($num2);  // convert to positive
// echo pi(); // 3.1415926535898

 






