<?php 
    $currentYear = 2024 ;
    $msg = '';
    if(isset($_GET['year']) && isset($_GET['isStudent'])){
        $birthYear = intval($_GET['year']);
        $isStudent = $_GET['isStudent'];
        $year = $currentYear - $birthYear ;
        if($year <= 18 && $isStudent == 'Yes'){
            $msg = "Your age is under or equal to 18 and you are a student";
        }elseif($year > 18 && $isStudent == 'Yes'){
            $msg = "Your age is older than 18 and you are a student";
        }elseif($year > 18 && $isStudent == 'No'){
            $msg = "Your age is older than 18 and you are not a student";
        }else{
            $msg = "Your age is under or equal to 18 and you are not a student";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-4 mx-auto mt-5">
                    <h4 class="fw-bold mb-3">Enter Year of Birth</h4>
                <form action="/student.php" method="GET">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="day" name="year" placeholder="Enter Year">
                        <label for="day">Enter Year </label>
                    </div>
                    <div class="mb-4">
                        <select name="isStudent" class="form-select" id="">
                            <option value="" selected>Select Answer</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <button class="btn btn-success mb-4">Submit</button> <br>
                    <span class="fw-bold fw-4">
                        <?php 
                            if(isset($birthYear) && isset($msg)){
                                echo $msg;
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