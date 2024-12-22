<?php 

header('content-type: application/json');

$pathToProductFile = '../storage/data/products.json';

if(!file_exists($pathToProductFile)) {
    echo json_encode([
        // 'result' => false,
        // 'message' => 'Products data not found.'
        'products' => []
    ]);
    exit();
}

$products = json_decode(file_get_contents($pathToProductFile), true);  // Read JSON file and convert to associative array

// $allPricePerProduct = array_column($products,'price');
// $totalPrice = array_sum($allPricePerProduct);

echo json_encode([
    'products' => $products  
])

?>