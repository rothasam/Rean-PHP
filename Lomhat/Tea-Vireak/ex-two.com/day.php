<?php 
$storeDay="";
    if(isset($_GET['day'])){
        $day = $_GET['day'];
        switch($day){
            case 1 : $storeDay = "Monday"; break;
            case 2 : $storeDay = "Tuesday"; break;
            case 3 : $storeDay = "Wednesday"; break;
            case 4 : $storeDay = "Thursday"; break;
            case 5 : $storeDay = "Friday"; break;
            case 6 : $storeDay = "Saturday"; break;
            case 7 : $storeDay = "Sunday"; break;
            default : $storeDay = "Invalid Day"; break;
        }
    }else{
        echo "";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-4 mx-auto mt-5">
                    <h4 class="fw-bold mb-3">Find day by entering number [1-7]</h4>
                <form action="/day.php" method="GET">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="day" name="day" placeholder="Enter Day">
                        <label for="day">Enter Day </label>
                    </div>
                    <button class="btn btn-success mb-4">Submit</button> <br>
                    <span class="text-center fw-bold fs-4">
                        <?php 
                            if(!empty($storeDay)){
                                if($day>=1 && $day<=7){
                                    echo "Today is " . $storeDay;
                                }else{
                                    echo "<span class='text-danger'>$storeDay</span>";
                                }
                            }
                        ?>
                    </span>
                    
                </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>