<?php 
header('Content-Type: application/json');

$pathToProductFile = '../storage/data/products.json';
if(isset($_POST['search'])){
    $search = strval($_POST['search']);
}

if(file_exists($pathToProductFile)){
    echo $search;
    // echo json_encode(['search' => $search]);
    exit;
}


// if (isset($_POST['search'])) {
//     $search = $_POST['search'];
//     echo json_encode(['search' => $search]); // Return the search query as a JSON response
// } else {
//     // Handle the case where 'search' is not set
//     http_response_code(400); // Bad request
//     echo json_encode(['error' => 'Search term is missing.']);
// }