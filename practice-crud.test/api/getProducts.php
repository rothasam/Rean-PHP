<?php 

header('content-type: application/json');

// if(file_exists('../../storage/data/products.json')){

// }
$products = file_exists('../storage/data/products.json') ? json_decode(file_get_contents('../storage/data/products.json'),true) : [] ;


echo json_encode($products);
    // print_r($products);
?>