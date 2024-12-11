<?php
    $num1 = 3;
    $num2 = 2;
    $result = $num1 - $num2;

// . (dot) used for concate string
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch1 Lesson3</title>
</head>
<body>
    <p>Result : <?php echo $num1 . " + " . $num2 . " = " . $num1 + $num2 ?></p>
    <p>Result : <?php echo $num1 . " - " . $num2 . " = " . $result ?></p>
    <p>Result : <?php echo $num1 . " * " . $num2 . " = " . $num1 * $num2 ?></p>
    <p>Result : <?php echo $num1 . " / " . $num2 . " = " . $num1 / $num2 ?></p>
    <p>Result : <?php echo $num1 . " ** " . $num2 . " = " . $num1 ** $num2 ?></p>

    <p>Result : <?php echo $num1 . " += " . $num2 . " = " . $num1 += $num2 ?></p>
    <p>Result : <?php echo $num1 . " **= " . $num2 . " = " . $num1 **= $num2 ?></p>

    <?php
        $num1 = 2;
        $num2 = "2";
        //   $num1 === $num2   the same as    $num1 == $num2 && gettype($num1) == gettype($num2)
        if($num1 == $num2 && gettype($num1) == gettype($num2)){
            echo "Both numbers are equal and have the same type";
        }elseif ($num1 == $num2){
            echo "Numbers are equal but different type";
        }else{
            echo "Numbers are not equal";
        }
        


        // if($num1 != $num2 && gettype(value: $num1) != gettype(value: $num2)){
        //     echo "Both numbers are not equal but different type";
        // }elseif ($num1 != $num2){
        //     echo "Numbers are not equal";
        // }elseif($num1 == $num2 && gettype(value: $num1) == gettype(value: $num2)){
        //     echo "Numbers are equal and have the same type";
        // }else{
        //     echo "Numbers are equal";
        // }

        $num1 = 2;
        $num2 = 4;

        echo "</br>";
        if ($num1 < $num2){
            echo "num1 is less than num2";
        }elseif($num1 > $num2){
            echo "num1 is greater than num2";
        }else{
            echo "num1 is equal to num2";	
        }

    ?>
</body>
</html>