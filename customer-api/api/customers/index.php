<?php

require_once '../../model/Customer.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$customer = new Customer();
echo $customer->index();