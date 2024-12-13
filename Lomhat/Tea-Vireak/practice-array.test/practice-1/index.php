<?php
    $fruits = array("Apple", "Banana", "Orange", "Mango", "Pineapple");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <!-- code here -->
        <?php for($i=0; $i<count($fruits); $i++){ ?>
        <div class="card" style="width: 18rem; height: 10rem">
            <img src="img/<?php echo $fruits[$i] ?>.jpg" class="card-img-top" alt="<?php echo $fruits[$i]?>">   
            <div class="card-body">
                <p class="card-t"><?php echo $fruits[$i]?></p>
            </div>
        </div>
        <?php } ?>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>