<?php
    // Global declaration
    $age = 12;
    $height = 1.65;
    $is_single = true;  // variable as snack case
    $express = 'PHP <h2 class="fw-bold">Hello</h2>' ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotha</title>
</head>
<body>
    <h1>
        <?php 
            $name = "RothA </br>"; // name can be declare at the top of doc
            echo $name;
            echo "rotha </br>"; # comment can be using // or # 
                          // and for multiple line comment using /*  */ 
            print_r($age);
        ?>
    </h1>


    <p>Age : <?php echo $age;?> years old</p>
    <p>Height : <?php echo $height?> m</p>
    <!-- <p>Single : <?php echo $is_single?> </p> -->
     <p>Single : <?php echo $is_single ? "Yes": "No"; ?></p>
    <!-- <p>finally it worked</p> -->
</body>
</html>

