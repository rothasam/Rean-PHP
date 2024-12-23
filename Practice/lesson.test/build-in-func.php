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



// let summary those function in math
// 1. pow() : calculate power of a number
// 2. sqrt() : calculate square root of a number
// 3. round() : round a number to nearest integer or specified number of decimals
// 4. ceil() : round up to nearest integer
// 5. floor() : round down to nearest integer
// 6. abs() : convert to positive number
// 7. pi() : get value of pi

//let summary function in string
// 1. strrev() : reverse string
// 2. strlen() : get length of string
// 3. strpos() : find position of string
// 4. str_split() : split string into array
// 5. str_replace() : replace string with another string
// 6. substr() : get part of string
// 7. trim() : remove space from string
// 8. strtolower() : convert string to lower case
// 9. strtoupper() : convert string to upper case
// 10. ucfirst() : convert first character to upper case
// 11. ucwords() : convert first character of each word to upper case
// 12. str_word_count() : count number of words in string


// let summary function in array
// 1. array_push() : add element to end of array
// 2. array_pop() : remove last element from array
// 3. array_shift() : remove first element from array
// 4. array_unshift() : add element to beginning of array
// 5. array_merge() : merge two arrays
// 6. array_merge_recursive() : merge two arrays recursively
// 7. array_keys() : get keys of array
// 8. array_values() : get values of array
// 9. array_count_values() : count number of each value in array
// 10. array_sum() : sum all values in array
// 11. array_unique() : remove duplicate values from array
// 12. array_search() : find value in array
// 13. in_array() : check if value is in array
// 14. array_rand() : get random key from array





 






