<?php

require_once '../../model/Customer.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$customer = new Customer();
$customer->id = intval($_GET['id']);
$customer->firstName = trim(strval($_POST['firstName']));
$customer->lastName = trim(strval($_POST['lastName']));
$customer->gender = trim(strval($_POST['gender']));
$customer->email = trim(strval($_POST['email']));
$customer->filePhoto = $_FILES['photo'] ?? null;
echo $customer->update();