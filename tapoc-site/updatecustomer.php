<?php include 'config.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM customers WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Update Customer</h2>

<form method="POST">
    <input type="text" name="customer_name" value="<?= $row['customer_name'] ?>" required>
    <input type="email" name="email" value="<?= $row['email'] ?>" required>
    <input type="text" name="phone" value="<?= $row['phone'] ?>" required>
    <input type="text" name="address" value="<?= $row['address'] ?>" required>
    <button name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn, "UPDATE customers SET 
        customer_name='$name',
        email='$email',
        phone='$phone',
        address='$address'
        WHERE id=$id");

    header("Location: customer.php");
}
?>

</body>
</html>
