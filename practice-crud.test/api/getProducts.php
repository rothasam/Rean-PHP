<?php 

    $file = 'products.json';
    $products = file_exists($file) ? json_decode(file_get_contents($file),true) : [] ;

    // print_r($products);
?>