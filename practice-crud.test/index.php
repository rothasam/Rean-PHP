<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Inventory Management</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .results-table {
            margin: 20px auto;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container {
            margin: 20px auto;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <h1 class="text-center mb-4 text-white">Product Inventory Management</h1>
                <div class="form-container">
                    <h5>Add New Product</h5>
                    <form method="POST" id="frmInfo">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label for="brandName" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Enter brand name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Choose product image" >
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
            <div class="col-7">
                <div class="results-table">
                <h5>Product List</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <!-- Display each product and its details -->
                    
                    </tbody>
                </table>
                <!-- Display the total price here -->
                <!-- <h5>Total Price: <?php echo "$". number_format($totalPrice,2); ?></h5> -->
                </div>
            </div>
        </div>

        
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>