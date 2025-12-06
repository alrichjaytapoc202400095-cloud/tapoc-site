<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">☕ Coffee Shop</div>
    <div class="nav-links">
        <a href="index.php">Inventory</a>
        <a href="customer.php">Customers</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>
</nav>

<h1>Customer List</h1>
<a href="addcustomer.php" class="btn">Add Customer</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM customers");
    while ($row = mysqli_fetch_assoc($result)):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['customer_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['address'] ?></td>
        <td>
           <td>
         <a href="updatecustomer.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
             <a href="deletecustomer.php?id=<?= $row['id'] ?>" class="btn delete">Delete</a>
</td>

        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
