<?php 
    $_POST = json_decode( file_get_contents('php://input'), true); 
    $name = strval($_POST['name']);
    $email = strval($_POST['email']);
    $phone = strval($_POST['phone']); 
    echo $name . ' ' . $phone . ' ' . $email;
?>
