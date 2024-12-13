<?php 
    $_POST = json_decode( file_get_contents('php://input'), true); 
    $name = strval($_POST['name']);
    $email = strval($_POST['email']);
    $phone = strval($_POST['phone']); 
    echo $name . ' ' . $phone . ' ' . $email;

// In PHP :
    // json_encode($arr) : convert from php array/object to json text/string
    // json_decode($json) : convert from json string to php array/object
    //json_decode($json,true) : convert from json to associative array

// In JS : 
    // JSON.stringify(obj) : convert from js object/array to json string
    // JSON.parse(json) : convert from json string to js object/array

    //axios.get(url).than(res)
    //axios.post(url,data).then(res)
?>

