<?php 

    header('Content-Type: application/json'); // sets the Content-Type header of the HTTP response to application/json.
                                            // By default, PHP sends the response with the Content-Type: text/html header, which is suitable for HTML pages but not for JSON responses.
                                        
    // get data from input  
    if(isset($_POST['name']) && $_POST['brand'] && $_POST['price'] && $_POST['stock']){
        $name = strval($_POST['name']);
        $brand = strval($_POST['brand']);
        $price = floatval($_POST['price']);
        $stock = intval($_POST['stock']);
    }                             

    $image = null;
    $fileImgName = '';

    if(isset($_FILES['image'])){
        $image = $_FILES['image'];
    }

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

    if($image){
        if($image['size'] > 5 * 1024 * 1024){  // 5MB
            echo json_encode([
                'result' => false,
                'message' => 'File size is too large'
            ]);
            exit();
        }
        if(!in_array($image['type'], ['image/jpeg', 'image/png', 'image/jpg','image/webp','image/svg'])){
            echo json_encode([
                'result'=> false,
                'message' => 'Wrong type of file.'
            ]);
            exit(); 
        }

        $pathImg = pathinfo($image['name']); 
        $fileImgName = uniqid(). '.'. $pathImg['extension'];
        copy($image['tmp_name'], '../storage/photo/' . $fileImgName);
    }
    

    $pathToProductFile = '../storage/data/products.json';
    $products = [];  // empty array
    $id = 1;  // default 
    if(file_exists($pathToProductFile)){
        $products = json_decode(file_get_contents($pathToProductFile),true);  // Without true, it would decode the JSON as a PHP object instead of associative array
        $countId = array_column($products,'id');  // count all id
        $id = max($countId) + 1; // find largest id(the last one)

    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newProduct = [
        'id' => $id,
        'name' => $name,
        'brand' => $brand,
        'price' => $price,
        'stock' => $stock,
        'image' => $fileImgName
    ];

    array_push($products,$newProduct); // append new data to associativee array
    file_put_contents($pathToProductFile, json_encode($products),JSON_PRETTY_PRINT); // convert associative array to json and put new contnt to json file
}



    echo json_encode([
        'result' => true,
        'msg' => 'ot error te'
    ]);

    

?>