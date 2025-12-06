<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $products = $_POST['product_id'];  // contains product IDs
    $quantities = $_POST['quantity'];

    for ($i = 0; $i < count($products); $i++) {

        $product_id = $products[$i];
        $qty = $quantities[$i];

        // Fetch product name, price, and stock
        $res = mysqli_query($conn, "SELECT product_name, price, stock FROM products WHERE id='$product_id'");
        $data = mysqli_fetch_assoc($res);

        if (!$data) {
            echo "Product not found!";
            exit;
        }

        $productName = $data['product_name'];
        $pricePerUnit = $data['price'];
        $stock = $data['stock'];

        // Check stock
        if ($qty > $stock) {
            echo "Not enough stock for product: $productName!";
            exit;
        }

        $totalPrice = $qty * $pricePerUnit;

        // Insert into orders table
        mysqli_query($conn, "
            INSERT INTO orders (customer_name, product, quantity, price, status)
            VALUES ('Walk-in Customer', '$productName', '$qty', '$totalPrice', 'Pending')
        ");

        // Deduct stock
        mysqli_query($conn, "UPDATE products SET stock = stock - $qty WHERE id='$product_id'");
    }

    header("Location: orderlist.php");
    exit;
}
?>
