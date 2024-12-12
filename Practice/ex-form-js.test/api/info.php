<?php 
    $_POST = json_decode( file_get_contents('php://input'), true); 
    $name = strval($_POST['name']);
    $email = strval($_POST['email']);
    $phone = strval($_POST['phone']); 
    echo $name . ' ' . $phone . ' ' . $email;


    // json_encode($arr) : convert from array to json text
    // json_decode($json) : convert from json to array
    //json_encode($json,true) : convert from json to associative array


    // JSON.stringify(obj) : convert from object to json
    // JSON.parse(json) : convert from json to object
?>

