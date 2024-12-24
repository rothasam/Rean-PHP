<?php

// Why function ? => code resueable, easy to use

// + Biuld-in function 

// + User define function. Have 2 types :
// 1 . Non-Return function
// 2 . Return function


// Type of parameter
// 1. Value type : require argument, which provide to parameter
// 2. Default type : parameter start with value. ($var = value)


// function name(){}


//  Header of function 
/*
* @param int $row
* @param int $col
* @param string $symbol
*/

// function draw_egg($row,$col,$symbol){
//     for ($i = 1; $i <= $row ; $i++){
//         for ($j = 1; $j <= $col ; $j++){
//             echo $symbol . ' ';
//         }
//         echo "<br>";
//     }
// }

// draw_egg(3,5,'0');
// echo "<br/> <br/> ";
// draw_egg(5,10,'*');
// echo "<br/> <br/> ";
// draw_egg(3,10,'#');

// prototype function : draw_egg(int,int,string): void
// description
// definition

// php doc ?
// automate testing ?


// function payment($qty, $price, $discount=0){
//     $total = $qty * $price;
//     $pay = $total - $total * ($discount/100);
//     return $pay;

// }

// echo payment(10, 100, 10);
// echo payment(10, 100);


// ----------------------------------------------------------------

function num_en_to_kh($num){
    $strNumEn = strval($num);
    $length = strlen($strNumEn);
    $strNumKh ='';
    for ($i = 0; $i < $length; $i++) {
        if($strNumEn[$i] == '1'){
            $strNumKh .= '១';
        }else if($strNumEn[$i] == '2') {
            $strNumKh .= '២';
        }else if($strNumEn[$i] == '3') {
            $strNumKh .= '៣';
        }else if($strNumEn[$i] == '4') {
            $strNumKh .= '៤';
        }else if($strNumEn[$i] == '5') {
            $strNumKh .= '៥';
        }else if($strNumEn[$i] == '6') {
            $strNumKh .= '៦';
        }else if($strNumEn[$i] == '7') {
            $strNumKh .= '៧';
        }else if($strNumEn[$i] == '8') {
            $strNumKh .= '៨';
        }else if($strNumEn[$i] == '9') {
            $strNumKh .= '៩';
        }else if($strNumEn[$i] == '0') {
            $strNumKh .= '០';
        }
        else{
            return;
        }
    }

    return $strNumKh;
}

echo num_en_to_kh(1233);
