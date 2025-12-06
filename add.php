<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

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

/* -------------- FORM CONTAINER -------------- */
.container {
    width: 450px;
    background: white;
    padding: 25px;
    margin: 20px auto;
    border-radius: 12px;
    border-left: 6px solid #6b4f30;
    box-shadow: 0 4px 12px rgba(0,0,0,0.18);
}

form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border: 1px solid #bbb;
    border-radius: 8px;
    font-size: 14px;
}
form input:focus {
    border-color: #6b4f30;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background: #6b4f30;
    border: none;
    color: white;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s ease;
}
button:hover {
    background: #5a3e2b;
}

.back-btn {
    display: inline-block;
    text-decoration: none;
    padding: 8px 14px;
    background: #6b4f30;
    color: white;
    border-radius: 6px;
    margin-bottom: 15px;
}
.back-btn:hover {
    background: #5a3e2b;
}

.view-btn {
    display: block;
    text-align: center;
    padding: 10px;
    background: #6b4f30;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    margin-top: 15px;
}
.view-btn:hover {
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
        <a href="addproduct.php">Add Product</a>
        <a href="addstock.php">Add Stock</a>
    </div>
</div>

<!-- PAGE HEADER -->
<div class="home-section">
    <h1>Add Product</h1>
    <p>Create new items for your inventory.</p>
</div>

<div class="container">
    <h2>Add New Product</h2>

    <a class="back-btn" href="index.php">⬅ Back to Home</a>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="product_name" placeholder="Product Name" required>

        <input type="file" name="photo" accept="image/*" required>

        <input type="text" name="category" placeholder="Category" required>

        <input type="number" name="stock" placeholder="Stock" required>

        <input type="number" step="0.01" name="price" placeholder="Price" required>

        <button name="submit">Add Product</button>
    </form>

    <a class="view-btn" href="viewproduct.php">View Products</a>
</div>


<?php
// PROCESS ADD PRODUCT
if (isset($_POST['submit'])) {

    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $upload_path = "uploads/" . $photo;

    move_uploaded_file($tmp_name, $upload_path);

    mysqli_query($conn, "INSERT INTO products(product_name, photo, category, stock, price)
                         VALUES ('$name', '$photo', '$category', '$stock', '$price')");

    header("Location: viewproduct.php");
}
?>

</body>
</html>
