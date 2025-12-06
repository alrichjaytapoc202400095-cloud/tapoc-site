<?php 
include 'config.php';

// ADD STOCK PROCESS
if (isset($_POST['add_stock'])) {

    $product_id = $_POST['product_id'];
    $add_amount = $_POST['add_amount'];

    $product = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
    if (!$product || mysqli_num_rows($product) == 0) {
        echo "<script>alert('Product not found!'); window.location='addstock.php';</script>";
        exit();
    }

    $row = mysqli_fetch_assoc($product);
    $new_stock = $row['stock'] + $add_amount;

    mysqli_query($conn, "UPDATE products SET stock='$new_stock' WHERE id='$product_id'");

    echo "<script>alert('Stock added successfully!'); window.location='addstock.php';</script>";
}

$all_products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Stock</title>

    <style>
        /* ---------------- NAVBAR ---------------- */
        .navbar {
            background: #5a3e2b;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.25);
        }
        .navbar .logo {
            color: #f7e7c1;
            font-size: 24px;
            font-weight: bold;
        }
        .nav-links {
            display: flex;
            gap: 25px;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-links a:hover {
            color: #f7e7c1;
            transform: scale(1.1);
        }

        /* -------------- HOME SECTION -------------- */
        .home-section {
            background: #f2e6d8;
            padding: 40px;
            margin-bottom: 25px;
            border-radius: 10px;
            border-left: 6px solid #6b4f30;
        }
        .home-section h1 {
            font-size: 32px;
            color: #5a3e2b;
        }
        .home-section p {
            font-size: 18px;
            color: #3d2b1f;
        }

        /* -------------- BODY -------------- */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f1e3;
        }
        h2 {
            color: #5a3e2b;
        }

        /* -------------- FORM -------------- */
        form {
            width: 60%;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            border-left: 6px solid #6b4f30;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.15);
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            width: 100%;
            background: #6b4f30;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #5a3e2b;
        }

        /* -------------- TABLE -------------- */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #fff;
        }
        table, th, td {
            border: 1px solid #bbb;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: #6b4f30;
            color: #fff;
        }
        .low {
            background: #ffb3b3 !important;
            font-weight: bold;
        }

        .btn-back {
            text-decoration: none;
            display: inline-block;
            padding: 10px 15px;
            background: #6b4f30;
            color: white;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .btn-back:hover {
            background: #5a3e2b;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">Coffee Shop</div>
    <div class="nav-links">
        <a href="index.php">Inventory</a>
        <a href="order.php">Orders</a>
        <a href="add.php">Add Product</a>
        <a href="addstock.php">Add Stock</a>
    </div>
</div>

<!-- HOME SECTION -->
<div class="home-section">
    <h1>Add Stock</h1>
    <p>Update product inventory and manage stock levels.</p>
</div>

<a href="index.php" class="btn-back">⬅ Back</a>

<h2>➕ Add Stock</h2>

<form method="POST">
    <label>Product:</label>
    <select name="product_id" required>
        <option value="">Choose Product</option>

        <?php
        $products = mysqli_query($conn, "SELECT * FROM products");
        while ($p = mysqli_fetch_assoc($products)) {
        ?>
            <option value="<?= $p['id']; ?>">
                <?= $p['product_name']; ?> (Current: <?= $p['stock']; ?>)
            </option>
        <?php } ?>
    </select>

    <label>Amount:</label>
    <input type="number" name="add_amount" min="1" required>

    <button type="submit" name="add_stock">Add Stock</button>
</form>


<h2>📦 Current Stock</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($all_products)) { ?>
        <tr class="<?= ($row['stock'] <= 5) ? 'low' : '' ?>">
            <td><?= $row['id']; ?></td>
            <td><?= $row['product_name']; ?></td>
            <td>₱<?= number_format($row['price'], 2); ?></td>
            <td><?= $row['stock']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
