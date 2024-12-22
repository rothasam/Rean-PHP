<?php

header('Content-Type: application/json');

$seletedID = $_GET['id'];
$pathToProductFile = '../storage/data/products.json';
$products = json_decode(file_get_contents($pathToProductFile),true);

foreach($products as $index => $proItem){  
    if($proItem['id'] == $seletedID){
        $imagePath = '../storage/photo/' . $proItem['image'];
        if($proItem['image'] && file_exists($imagePath)){
            unlink($imagePath);  // delete image file if exist before remove product from array  
        }
        array_splice($products,$index,1);  // remove out 1 element or a row from products array
        break;  // break the loop after remove the product from array to prevent further iterations
    }
}


if(count($products) == 0 ){
    unlink($pathToProductFile);
} else {
    file_put_contents($pathToProductFile,json_encode($products));
}

echo json_encode([
    'result' => true,
    'message' => 'Delete successfully.'
]);

