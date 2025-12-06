<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>View Products</title>

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

/* ---------------- PAGE BODY ---------------- */
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background: #f5f1e3;
}

h2 {
    text-align: center;
    color: #5a3e2b;
    font-size: 32px;
    margin-bottom: 25px;
}

/* ---------------- BUTTON ---------------- */
.back-btn {
    display: block;
    width: 180px;
    text-align: center;
    margin: 15px auto;
    padding: 12px;
    background: #6b4f30;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}
.back-btn:hover {
    background: #5a3e2b;
}

/* ---------------- TABLE ---------------- */
table {
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}
th {
    background: #6b4f30;
    color: white;
    padding: 14px;
    font-size: 16px;
}
td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* ---------------- PHOTO ---------------- */
img {
    width: 70px;
    height: 70px;
    border-radius: 8px;
    object-fit: cover;
}

/* ---------------- ACTION BUTTONS ---------------- */
.btn {
    padding: 7px 14px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 14px;
}
.edit { background: #3a7bd5; }
.edit:hover { background: #1d5fb8; }
.delete { background: #d9534f; }
.delete:hover { background: #b33a33; }

</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">Coffee Shop</div>
    <div class="nav-links">
        <a href="index.php">Inventory</a>
        <a href="order.php">Orders</a>
        <a href="addproduct.php">Add Product</a>
        <a href="addstock.php">Add Stock</a>
        <a href="category.php">Categories</a>
        <a href="customer.php">Customers</a>
    </div>
</div>

<h2>Product List</h2>

<a href="addproduct.php" class="back-btn">➕ Add New Product</a>

<table>
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

    <?php
        $result = mysqli_query($conn, "SELECT * FROM products");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            
            // FIXED IMAGE PATH
            echo "<td><img src='uploads/" . $row['photo'] . "'></td>";

            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "<td>₱" . number_format($row['price'], 2) . "</td>";

            echo "<td>
                    <a href='update.php?id=".$row['id']."' class='btn edit'>Edit</a>
                    <a href='deleted.php?id=".$row['id']."' class='btn delete'>Delete</a>
                  </td>";

            echo "</tr>";
        }
    ?>
</table>

</body>
</html>
