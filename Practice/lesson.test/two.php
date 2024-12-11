<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch1 Lesson3</title>
</head>
<body>

    <main>
        <form action="" method="POST">
            <label for="">Enter Age :</label>
            <input type="text" name="stuAge"> <br> <br>
            <label for="">Your Status :</label>
                <input type="radio" name="status" value="Student" checked> Student
                <input type="radio" name="status" value="Not a student"> Not a student
            <br> <br>
            <button type="submit">submit</button>
            <br> <br>
        </form>
    </main>
    

    <?php
        // for($i=0 ; $i<5 ; $i++){
        //     echo $i;
        // }

        // echo "</br></br>";
        // $n=0;
        // while($n <= 5){
        //     echo "</br>";
        //     echo $n;
        //     $n++;
        // }

        // $num1 = 2;
        // $num2 = 3;

        // echo "</br></br>";
        // $result = $num1 <= $num2 ? "num1 is smaller or equal to num2" : "num1 is greater or equal to num2";
        // echo $result;


        // // $a=3;
        // echo "</br></br>";
        // $result = $a ?? "a don't have a value";
        // echo $result;


        // echo "</br></br>";
        // $arr = array(1,5,3,66,22);
        // $arr = ['apple','orage','Mango'];
        // foreach($arr as $a){
        //     echo "</br>";
        //     echo $a;
        // }

// -----------------------------------------------

        $student_age = intval($_POST['stuAge']);
        $isStudent = $_POST['status'];
        if($student_age <= 18 && $isStudent == 'Student'){
            echo "Your age is under or equal to 18 and you are a student";
        }elseif($student_age > 18 && $isStudent == 'Student'){
            echo "Your age is older than 18 and you are a student";
        }elseif($student_age > 18 && $isStudent == 'Not a student'){
            echo "Your age is older than 18 and you are not a student";
        }

        $day = 3;
        $storeDay="";
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

        echo "</br></br>";
        echo "Today is ". $storeDay;



?>


</body>
</html>