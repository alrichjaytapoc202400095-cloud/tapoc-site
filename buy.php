<?php
include 'database.php';

if (isset($_POST['submit_order'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // 1. Check Stock Level
    $check = $conn->query("SELECT price, stock FROM products WHERE id = $product_id");
    $row = $check->fetch_assoc();

    if ($row['stock'] >= $quantity) {
        // Calculate Total
        $total = $row['price'] * $quantity;

        // 2. Insert Order
        $conn->query("INSERT INTO orders (product_id, quantity, total_price) VALUES ('$product_id', '$quantity', '$total')");

        // 3. SUBTRACT STOCK
        $conn->query("UPDATE products SET stock = stock - $quantity WHERE id = $product_id");

        echo "<script>alert('Sold! Total: ₱$total'); window.location.href='buy.php';</script>";
    } else {
        echo "<script>alert('Not enough stock!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Sale</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>💰 Point of Sale</h2>
        <a href="index.php">Back to Home</a>

        <div class="card">
            <form method="POST">
                <label>Select Siomai/Drink:</label>
                <select name="product_id" required>
                    <?php
                    $result = $conn->query("SELECT * FROM products");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']} (Stock: {$row['stock']} - ₱{$row['price']})</option>";
                    }
                    ?>
                </select>
                
                <label>Quantity:</label>
                <input type="number" name="quantity" value="1" min="1" required>
                
                <br><br>
                <button type="submit" name="submit_order" class="btn big-btn">CONFIRM SALE</button>
            </form>
        </div>
    </div>
</body>
</html>