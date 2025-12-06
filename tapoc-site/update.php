<?php include 'config.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>
<head>
<title>Update Product</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Update Product</h2>
<form method="POST">
<input type="text" name="product_name" value="<?= $row['product_name'] ?>" required>
<input type="text" name="category" value="<?= $row['category'] ?>" required>
<input type="number" name="stock" value="<?= $row['stock'] ?>" required>
<input type="number" step="0.01" name="price" value="<?= $row['price'] ?>" required>
<button name="update">Update</button>
</form>


<?php
if (isset($_POST['update'])) {
$name = $_POST['product_name'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$price = $_POST['price'];


mysqli_query($conn, "UPDATE products SET product_name='$name', category='$category', stock='$stock', price='$price' WHERE id=$id");


header("Location: index.php");
}
?>
</body>
</html>