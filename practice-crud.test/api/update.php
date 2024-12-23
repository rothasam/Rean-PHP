<?php

header('Content-Type: application/json');

$seletedID = $proName = $brandName = $price = $stockQty = '';
if(isset($_POST['name']) && $_POST['brand'] && $_POST['price'] && $_POST['stock'] ){
    $seletedID = intval($_POST['id']);
    $proName = strval($_POST['name']);
    $brandName = strval($_POST['brand']);
    $price = floatval($_POST['price']);
    $stockQty = intval($_POST['stock']);
}
$pathToProductFile = '../storage/data/products.json';

$image = null;
if(isset($_FILES['image'])){
    $image = $_POST['image'];
}

if(!file_exists($pathToProductFile)){
    echo json_encode(['msg' => 'File not found']);
    exit();
}

$fileImgName ='';
if($image){
    $pathImg = pathinfo($image['name']); 
    $fileImgName = uniqid(). '.'. $pathImg['extension'];
    copy($image['tmp_name'], '../storage/photo/' . $fileImgName);
}

$products = json_decode(file_get_contents($pathToProductFile),true);

foreach ($products as $index => $proItem) {
    if($proItem['id'] == $seletedID){
        $products[$index]['name'] = $proName;
        $products[$index]['brand'] = $brandName;
        $products[$index]['price'] = $price;
        $products[$index]['stock'] = $stockQty;

        if($image){
            $oldImagePath = '../storage/photo/' . $proItem['image'];
            if($proItem['image'] && file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
            $proItem['image'] = $fileImgName;
        }
        break; 
    }
}

file_put_contents($pathToProductFile, json_encode($products));
// if (file_put_contents($pathToProductFile, json_encode($products)) === false) {
//     echo json_encode(['msg' => 'Failed to write to file']);
//     exit();
// }

echo json_encode(['result'=> true,'msg' => 'Update successful']);


