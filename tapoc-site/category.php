<?php
include 'config.php';

// Add Category
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    mysqli_query($conn, $query);
    header("Location: category.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Category Management</title>

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

/* ---------------- PAGE HEADER ---------------- */
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

/* ---------------- BODY ---------------- */
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background: #f5f1e3;
}

/* ---------------- CONTAINER ---------------- */
.container {
    width: 650px;
    background: white;
    padding: 25px;
    margin: auto;
    border-radius: 12px;
    border-left: 6px solid #6b4f30;
    box-shadow: 0 4px 12px rgba(0,0,0,0.18);
}

h2 {
    color: #5a3e2b;
    text-align: center;
}

/* ---------------- FORM ---------------- */
input[type="text"] {
    width: 80%;
    padding: 12px;
    border: 1px solid #6b4f30;
    border-radius: 8px;
    font-size: 16px;
}

button {
    background: #6b4f30;
    color: white;
    padding: 12px 20px;
    border: none;
    margin-top: 10px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}
button:hover {
    background: #5a3e2b;
}

/* ---------------- TABLE ---------------- */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
th {
    background: #6b4f30;
    color: white;
    padding: 10px;
}
td {
    padding: 10px;
    text-align: center;
    background: #f2e6d8;
    border-bottom: 1px solid #c9b8a8;
}

/* ---------------- BACK BUTTON ---------------- */
.back-btn {
    display: inline-block;
    margin-top: 20px;
}
.back-btn button {
    background: #444;
}
.back-btn button:hover {
    background: #222;
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
        <a href="addproduct.php">Add Product</a>
        <a href="addstock.php">Add Stock</a>
        <a href="category.php">Categories</a>
    </div>
</div>

<!-- PAGE HEADER -->
<div class="home-section">
    <h1>Category Management</h1>
    <p>Manage and organize product categories.</p>
</div>

<div class="container">

    <h2>Add Category</h2>

    <form method="POST">
        <input type="text" name="category_name" placeholder="Enter Category Name" required>
        <br>
        <button type="submit" name="add_category">Add Category</button>
    </form>

    <h2>Category List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM categories");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['category_name']."</td>
                  </tr>";
        }
        ?>
    </table>

    <a href="index.php" class="back-btn">
        <button>← Back</button>
    </a>

</div>

</body>
</html>
