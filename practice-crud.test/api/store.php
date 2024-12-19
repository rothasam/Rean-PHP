<?php 

    header('Content-Type: application/json');

    $id = count($products) + 1;
    $name = strval($_POST['name']);
    $brand = strval($_POST['brand']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $image = $_FILES['image'];

    if(!is_dir('../storage')){
        mkdir('../storage');
    }
    if(!is_dir('../storage/data')){
        mkdir('../storage/data');
    }
    if(!is_dir('../storage/photo')){
        mkdir('../storage/photo');
    }
    
    $file = 'products.json';
    $products = file_exists($file) ? json_decode(file_get_contents($file),true) : [] ;

    
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = [
        'id' => $id,
        'name' => $name,
        'brand' => $brand,
        'price' => $price,
        'stock' => $stock,
        'image' => $image['name']
    ];

    array_push($products,$arr);
    file_put_contents($file, json_encode($products),JSON_PRETTY_PRINT);
}


    // echo json_encode([
    //     'id' => $id,
    //     'name' => $name,
    //     'brand' => $brand,
    //     'price' => $price,
    //     'stock' => $stock,
    //     'image' => $image['name']
    //     // 'msg' => 'save hz'
    // ]);

    

?>