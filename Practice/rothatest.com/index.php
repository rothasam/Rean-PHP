
<?php 
    $profile = "img/rotha.jpg";
    $name = "Rotha Sam";
    $gender = "Female";	
    $age = 21;
    $school = "ANT";
    $goal = "I want to be a Web Developer";

    $imgArr = [
        "img-1.png",
        "img-2.png",
        "img-3.png"
    ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise1</title>
    <link rel="stylesheet" href="css/style.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <main>
        <div class="container my-5">
            <div class="row">
                <div class="col-6 mx-auto wrapper p-5">
                    <div class="row">
                        <div class="col-4 pf-wrapper">
                            <img src="<?php echo $profile; ?>" alt="">
                        </div>
                        <div class="col-8 info">
                            <p>  
                                Name &nbsp;&nbsp;: <?php echo $name; ?>
                            </p>
                            <p> 
                                Gender : <?php echo $gender?>
                            </p>
                            
                        </div>
                        <div class="col-12 py-3 px-5">
                            <p>
                                Age &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $age; ?>
                            </p>
                            <p>
                                School : <?php echo $school;?>
                            </p>
                            <p>
                                Goal &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $goal;?>
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <?php 
                                    foreach($imgArr as $img){
                                ?>
                                    <div class="col-4 img gx-0">
                                        <img src="<?php echo 'img/', $img ?>" >
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>