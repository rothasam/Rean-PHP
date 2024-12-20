<?php 

    header('Content-Type: application/json');

    $name = strval($_POST['name']);
    $brand = strval($_POST['brand']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);
    $image = $_FILES['image'];

    // create directory or folder
    if(!is_dir('../storage')){
        mkdir('../storage');
    }
    if(!is_dir('../storage/data')){
        mkdir('../storage/data');
    }
    if(!is_dir('../storage/photo')){
        mkdir('../storage/photo');
    }

    $products = [];
    $id = 1;
    if(file_exists('../storage/data/products.json')){
        $products = json_decode(file_get_contents('../storage/data/products.json'),true);
        $countId = array_column($products,'id');
        $id = max($countId) + 1; // find largest id(the last one)
    }

    // $products = file_exists('../storage/data/products.json') ? json_decode(file_get_contents('../storage/data/products.json'),true) : [] ;

    $path = pathinfo($image['name']); 
    $filename = uniqid(). '.'. $path['extension'];
    copy($image['tmp_name'], '../storage/photo' . $filename);


    
    

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = [
        'id' => $id,
        'name' => $name,
        'brand' => $brand,
        'price' => $price,
        'stock' => $stock,
        'image' => $image['name']
    ];

    array_push($products,$arr);
    file_put_contents('../storage/data/products.json', json_encode($products),JSON_PRETTY_PRINT);
// }


    echo json_encode([
        'id' => $id,
        'name' => $name,
        'brand' => $brand,
        'price' => $price,
        'stock' => $stock,
        'image' => $image['name']
        // 'msg' => 'save hz'
    ]);

    

?>