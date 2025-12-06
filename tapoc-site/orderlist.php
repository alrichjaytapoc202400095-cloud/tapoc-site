<?php
include 'config.php';

$orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            padding: 30px;
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th {
            background: #007bff;
            color: white;
            padding: 10px;
            text-transform: uppercase;
        }
        table td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #e8f0ff;
        }
        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        button:hover {
            background: #0069d9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📦 Order Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($orders)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['customer_name']; ?></td>
                <td><?= $row['product']; ?></td>
                <td><?= $row['quantity']; ?></td>
                <td>₱<?= number_format($row['price'], 2); ?></td>
                <td><?= $row['order_date']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php } ?>

    </table>

    <a href="order.php"><button>⬅ Back to Order Page</button></a>
</div>

</body>
</html>
