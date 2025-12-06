<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Add Customer</title>

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

/* ---------------- FORM CONTAINER ---------------- */
form {
    width: 450px;
    background: white;
    padding: 25px;
    margin: 30px auto;
    border-radius: 12px;
    border-left: 6px solid #6b4f30;
    box-shadow: 0 4px 12px rgba(0,0,0,0.18);
}

form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 14px;
    border: 1px solid #6b4f30;
    border-radius: 8px;
    font-size: 14px;
}
form input:focus {
    border-color: #5a3e2b;
    outline: none;
}

/* ---------------- BUTTON ---------------- */
button {
    width: 100%;
    padding: 12px;
    background: #6b4f30;
    color: white;
    border: none;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
}
button:hover {
    background: #5a3e2b;
}

/* ---------------- TITLE ---------------- */
h2 {
    text-align: center;
    font-size: 28px;
    color: #5a3e2b;
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
        <a href="customer.php">Customers</a>
    </div>
</div>

<!-- PAGE HEADER -->
<div class="home-section">
    <h1>Add New Customer</h1>
    <p>Register a new customer into the Coffee Shop system.</p>
</div>

<!-- ADD CUSTOMER FORM -->
<form method="POST">
    <input type="text" name="customer_name" placeholder="Customer Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <input type="text" name="address" placeholder="Address" required>
    <button name="save">Save</button>
</form>

<?php
if (isset($_POST['save'])) {
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn, "INSERT INTO customers (customer_name, email, phone, address)
                         VALUES ('$name', '$email', '$phone', '$address')");

    header("Location: customer.php");
}
?>

</body>
</html>
