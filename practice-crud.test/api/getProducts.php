<?php 

header('content-type: application/json');

$pathToProductFile = '../storage/data/products.json';

if(!file_exists($pathToProductFile)) {
    echo json_encode([
        // 'result' => false,
        // 'message' => 'Products data not found.'
        'products' => [],
        'total_price' => 0
    ]);
    exit();
}

$products = json_decode(file_get_contents($pathToProductFile), true);  // Read JSON file and convert to associative array

$allPrice = array_column($products,'price');
$qty = array_column($products,'stock');
$totalPrice = 0;

foreach($allPrice as $index => $price) {
    $totalPrice += $price * $qty[$index];
}

echo json_encode([
    'products' => $products,
    'total_price' => $totalPrice
])

?>