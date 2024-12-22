<?php

header('Content-Type: application/json');

$seletedID = $_GET['id'];
$pathToProductFile = '../storage/data/products.json';
$products = json_decode(file_get_contents($pathToProductFile),true);

foreach($products as $index => $proItem){  // ot sov yol ?
    if($proItem['id'] == $seletedID){
        array_splice($products,$index,1);
    }
}


if(count($products) ==0 ){
    unlink($pathToProductFile);
} else {
    file_put_contents($pathToProductFile,json_encode($products));
}



