<?php

require_once '../../model/Customer.php';
header('content-type: application/json');
header('Access-Control-Allow-Origin: *');

$customer = new Customer();
$customer->id = $_GET['id'];
echo $customer->destroy();