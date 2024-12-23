<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Inventory Management</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <main>
        <img src="assets/img/bg.png" alt="" class="bg-img">
        <div class="container-fluid px-5">
            <div class="row ">
                

                <div class="col-4">
                    <div class="toast-container">
                        <div id="liveToast" class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body text-white" id="toastBody">
                                <!-- Hello, world! This is a toast message. -->
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <h4 class="text-center fw-bold mb-4" id="title-action">Add New Product</h4>
                        <form method="POST" id="frmInfo">
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
                                <label for="productName" id="labelName" class="form-label">Product Name</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Enter brand name" required>
                                <label for="brandName" class="form-label">Brand Name</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" required>
                                <label for="price" class="form-label">Price</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
                                <label for="stock" class="form-label">Stock Quantity</label>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="image" class="form-label">Image</label> -->
                                <input type="file" class="form-control" id="image" name="image" placeholder="choose image">
                            </div>
                            <button type="submit" class="btn w-100 mt-3" id="btn-submit">Add Product</button>
                        </form>

                    </div>
                    
                </div>
                <div class="col-8">
                <h1 class="text-center my-5 fw-bold">Product Inventory Management</h1>
                    <div class="results-table">
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <h5 class="fw-bold">Product List</h5>
                        <form class="search-box" id="frmSearch">
                            <input type="text" class="form-control" id="inputSearch" placeholder="Search by product name">
                            <button type="submit" class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass "></i>
                            </button>
                        </form>
                    </div>
                    <table class="table table-striped-columns">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <!-- <th scope="col">Image</th> -->
                                <th scope="col">Product Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="table-group-divider">
                            <!-- Display each product and its details -->
                        
                        </tbody>
                    </table>
                    <!-- Display the total price here -->
                    <!-- <h5>Total Price: <?php echo "$". number_format($totalPrice,2); ?></h5> -->
                    </div>
                </div>
            </div>


            

            
        </div>
    </main>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>