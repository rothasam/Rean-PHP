<?php 
header('Content-Type: application/json');

$pathToProductFile = '../storage/data/products.json';

// Check if a search term was provided
if (isset($_POST['search'])) {
    $search = strtolower(trim($_POST['search'])); // Normalize search input (lowercase, trimmed)
    
    if (file_exists($pathToProductFile)) {
        
        $products = json_decode(file_get_contents($pathToProductFile),true);

        // Filter products by name
        $filteredProducts = array_filter($products, function ($product) use ($search) {
            return strpos(strtolower($product['name']), $search) !== false; // Case-insensitive search
        });

        // Return the filtered products as JSON
        echo json_encode(['success' => true, 'products' => array_values($filteredProducts)]);
    }
} else {
    // Handle the case where 'search' is not set
    http_response_code(400); // Bad request
    echo json_encode(['success' => false, 'error' => 'Search term is missing.']);
}
