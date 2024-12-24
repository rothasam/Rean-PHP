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

function draw_egg($row,$col,$symbol){
    for ($i = 1; $i <= $row ; $i++){
        for ($j = 1; $j <= $col ; $j++){
            echo $symbol . ' ';
        }
        echo "<br>";
    }
}

draw_egg(3,5,'0');
echo "<br/> <br/> ";
draw_egg(5,10,'*');
echo "<br/> <br/> ";
draw_egg(3,10,'#');

// prototype function : draw_egg(int,int,string): void
// description
// definition

// php doc ?
// automate testing ?

