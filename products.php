<?php
include 'database.php';

// --- ADD NEW PRODUCT ---
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO products (name, price, stock) VALUES ('$name', '$price', 0)");
    header("Location: products.php");
}

// --- QUICK RESTOCK LOGIC ---
if (isset($_POST['restock'])) {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $conn->query("UPDATE products SET stock = stock + $qty WHERE id = $id");
    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📦 Inventory Management</h2>
        <a href="index.php">Back to Home</a>
        
        <!-- Add Product Form -->
        <div class="card">
            <h3>Add New Item</h3>
            <form method="POST">
                <input type="text" name="name" placeholder="Item Name (e.g. Japanese Siomai)" required>
                <input type="number" name="price" placeholder="Price" step="0.01" required>
                <button type="submit" name="add_product" class="btn">Create Item</button>
            </form>
        </div>

        <!-- Inventory Table -->
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Stock Left</th>
                <th>Quick Restock</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                $status = ($row['stock'] < 20) ? "style='color:red; font-weight:bold;'" : "";
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>₱{$row['price']}</td>
                    <td $status>{$row['stock']}</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='number' name='qty' placeholder='+' style='width:50px;' required>
                            <button type='submit' name='restock' class='btn-small'>Add</button>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>