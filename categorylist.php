<?php
include 'config.php';

$categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            padding: 40px;
        }
        .container {
            width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Category List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Date Added</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($categories)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['category_name']; ?></td>
                <td><?= $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <a href="category.php"><button>Add New Category</button></a>
</div>

</body>
</html>
