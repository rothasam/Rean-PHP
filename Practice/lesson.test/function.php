<?php 
    function showName(){
        echo "Rotha";
    }
    showName();

    function getName($name='haha'){
        return "My name is $name";
    }
    echo '<br>';
    echo getName();  // print default value which is 'haha'
    echo '<br>';
    echo getName('Name ey kor ban');


    function findAge($bornYear){
        $thisYear = date("Y");  // 2024
        $age = '';
        if($bornYear < $thisYear){
            $age = $thisYear - $bornYear;
        }elseif($bornYear==$thisYear){
            $age = 'Your born year is the current year';
        }else{
            $age = 'You are not born yet!!!';
        }
        return $age;
    }

    echo '<br>';
    echo findAge(2003);
    echo '<br>';
    echo findAge(1990);


    function calculateSalary($hour,$money,$day){
        $salary = $hour * $money * $day;
        return "You got $" . number_format(round($salary),2) . " per month.";
    }
    echo '<br>';
    echo calculateSalary(8,1.42,22);  

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->