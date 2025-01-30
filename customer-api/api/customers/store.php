<?php

require '../../model/Customer.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$customer = new Customer();
$customer->firstName = trim(strval($_POST['firstName']));
$customer->lastName = trim(strval($_POST['lastName']));
$customer->gender = trim(strval($_POST['gender']));
$customer->branch = trim(strval($_POST['branch']));
$customer->email = trim(strval($_POST['email']));
$customer->filePhoto = $_FILES['photo'] ?? null;  // Assign null if no photo is uploaded, otherwise use the uploaded filename
echo $customer->store();