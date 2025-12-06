<?php  
include 'config.php';
$products = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Multiple Order</title>

    <style>
        /* ======================= NAVBAR ======================= */
        .navbar {
            background: #5a3e2b;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.25);
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

        /* ======================= BODY ======================= */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f1e3;
        }

        h2 {
            color: #5a3e2b;
            text-align: center;
        }

        /* ======================= ORDER CONTAINER ======================= */
        .container {
            width: 550px;
            background: #fff7e8;
            padding: 25px;
            margin: auto;
            border-radius: 10px;
            border-left: 6px solid #6b4f30;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
        }

        select, input {
            width: 80%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #bbb;
            background: #fdf2df;
        }

        /* ======================= ROW ======================= */
        .row {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
        }

        /* Remove row button */
        .remove-btn {
            background: #b33636;
            color: white;
            padding: 5px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            height: 40px;
        }
        .remove-btn:hover {
            background: #8a2424;
        }

        /* Add more product button */
        .add-btn {
            width: 100%;
            padding: 12px;
            background: #6b4f30;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
        .add-btn:hover {
            background: #5a3e2b;
        }

        /* Submit order */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #5a3e2b;
            color: white;
            border: none;
            font-size: 17px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background: #3d291b;
        }

        /* Add stock button */
        .stock-btn {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            background: #875c36;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        .stock-btn:hover {
            background: #6b4f30;
        }

        a { text-decoration: none; }
    </style>

</head>
<body>

<div class="container">
    <h2>Create Order</h2>

    <form action="processorder.php" method="POST">

        <div id="orderItems">

            <!-- Default Row -->
            <div class="row">
                <select name="product_id[]" required>
                    <option value="">Select Product</option>

                    <?php while ($p = mysqli_fetch_assoc($products)) { ?>
                        <option value="<?= $p['id'] ?>">
                            <?= $p['product_name'] ?> (Stock: <?= $p['stock'] ?>)
                        </option>
                    <?php } ?>

                </select>

                <input type="number" min="1" name="quantity[]" placeholder="Qty" required>

                <button type="button" class="remove-btn" onclick="removeRow(this)">X</button>
            </div>

        </div>

        <button type="button" class="add-btn" onclick="addRow()">+ Add More Product</button>
        <button type="submit" name="submit">Place Order</button>

    </form>

    <!-- ADD STOCK BUTTON -->
    <a href="addstock.php"><button class="stock-btn">Add Stock</button></a>

</div>

<script>
function addRow() {
    let row = document.querySelector(".row").cloneNode(true);
    document.getElementById("orderItems").appendChild(row);
}

function removeRow(button) {
    let rows = document.querySelectorAll(".row");
    if (rows.length > 1) {
        button.parentElement.remove();
    } else {
        alert("You must have at least 1 product.");
    }
}
</script>

</body>
</html>
