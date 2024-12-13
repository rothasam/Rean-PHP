<?php
$totalAmount = 0;
$items = [
    ["product" => "Milk", "price" => 1.5, "quantity" => 2],
    ["product" => "Bread", "price" => 2.0, "quantity" => 1],
    ["product" => "Eggs", "price" => 3.0, "quantity" => 1,],
    ["product" => "Cheese", "price" => 5.0, "quantity" => 3,]

];

foreach ($items as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Receipt</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .receipt {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="receipt">
            <div class="receipt-header">
                <h1 class="h4">Receipt</h1>
                <p class="mb-0">ANT Market</p>
                <p class="mb-0">#86B, Khan Toulkok, Phnom Penh</p>
                <p class="mb-0">Phone: 016 / 010 666653</p>
                <hr>
            </div>
            <div class="item-list mb-4">
                <h5>Items Purchased</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- code here -->
                            <?php 
                                foreach($items as $item){
                                    $total = floatval($item['quantity']) * floatval($item['price']);
                                    $item['total'] = $total;
                                    echo "<tr>";
                                    echo "<td>" . $item['product'] . "</td>";
                                    echo "<td>" . $item['quantity'] . "</td>";
                                    echo "<td>$" . number_format($item['price'],2) . "</td>";
                                    echo "<td>$" . number_format($item['total'],2) . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                    </tbody>
                </table>
            </div>

            <div class="total mb-4">
                <h5>Total Amount</h5>
                <p class="h5">
                    <?php 
                        echo "Total: $" .  number_format($totalAmount,2);
                    ?>
                </p>
            </div>

            <div class="receipt-footer">
                <p>Thank you for your purchase!</p>
                <p>Visit us again!</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>