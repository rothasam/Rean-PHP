<?php 
    // echo "hi";

    // echo isset($_POST['num1']) ? "mean hz" : "ot mean";
    if(!empty($_POST['num_one']) && !empty($_POST['num_two'])){
        $num1 = floatval($_POST['num_one']);  # use POST cus the submit form use it                                   
        $num2 = floatval($_POST['num_two']);

        echo "Result : " . $num1 . " + " .  $num2 .  " = " .  $num1+$num2;

        // $result = $num1 + $num2;
        // echo "Result : $num1 + $num2 = $result";   this work only with double quotes
    }else{
        echo "Kom jes tea dak";
        exit;
    }

    


    # make sure the key in post match the name attribute in form input
    # use $_POST[name] : get value or data from form input (which use POST)
    # use $_GET[name] : get value or data from form input (which use GET)


    // inval() : convert to integer
    // floatval() : convert to float
    // strval() : convert to string
    // boolval() : convert to boolean
    // isset() : check if variable is set and not null (is declare or not) 
    // empty() : check if variable is empty or not (if no input)
    // unset() : unset variable
?>