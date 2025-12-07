<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sales History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📜 Sales History</h2>
        <a href="index.php">Back to Home</a>
        
        <table>
            <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            <?php
            // Join tables to get Product Name
            $sql = "SELECT orders.order_date, products.name, orders.quantity, orders.total_price 
                    FROM orders 
                    JOIN products ON orders.product_id = products.id 
                    ORDER BY orders.order_date DESC";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['order_date']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>₱{$row['total_price']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>