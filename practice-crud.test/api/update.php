<?php

header('Content-Type: application/json');

$seletedID = strval($_POST['id']);
$proName = strval($_POST['name']);
$brandName = strval($_POST['brand']);
$price = floatval($_POST['price']);
$stockQty = intval($_POST['stock']);
$pathToProductFile = '../storage/data/products.json';


if(!file_exists($pathToProductFile)){
    echo json_encode(['msg' => 'File not found']);
    exit();
}

$products = json_decode(file_get_contents($pathToProductFile),true);

foreach ($products as $index => $proItem) {
    if($proItem['id'] == $seletedID){
        $products[$index]['name'] = $proName;
        $products[$index]['brand'] = $brandName;
        $products[$index]['price'] = $price;
        $products[$index]['stock'] = $stockQty;
        // break;
    }
}

file_put_contents($pathToProductFile, json_encode($products));
// if (file_put_contents($pathToProductFile, json_encode($products)) === false) {
//     echo json_encode(['msg' => 'Failed to write to file']);
//     exit();
// }

echo json_encode(['msg' => 'Update successful']);


