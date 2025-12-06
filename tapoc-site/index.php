                    <?php include 'config.php'; ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                    <title>Coffee Shop Inventory</title>
                    <link rel="stylesheet" href="style.css">
                    </head>
                    <body>

                    <nav class="navbar">
                        <div class="logo">☕ Coffee Shop</div>
                        <div class="nav-links">
                            <a href=customer.php>Customer</a>
                            <a href="index.php">Inventory</a>
                            <a href="order.php">Order</a>
                            <li><a href="category.php">Manage Categories</a></li>


                        </div>
                    </nav>

                    <!-- WELCOME / HOME SECTION -->
                    <section id="home" class="home-section">
                        <h1>Welcome to Our Coffee Shop ☕</h1>
                        <p>Discover the taste of freshly brewed coffee and premium ingredients.</p>
                        <p>Enjoy your day with us!</p>
                    </section>

                    <h1>Coffee Shop Inventory</h1>
                    <a href="add.php" class="btn">Add Product</a>
                    <table>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>photo</th>
                    <th>Actions</th>
                    </tr>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM products");
                    while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><?= $row['category'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['photo'] ?></td>

                    <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                    <a href="deleted.php?id=<?= $row['id'] ?>" class="delete">Delete</a>
                    </td>
                    </tr>
                    <?php endwhile; ?>
                    </table>
                    <!-- About Section -->
                    <section id="about">
                    <h2>About Us</h2>
                    <p>Welcome to our Coffee Shop! We offer premium drinks and freshly brewed coffee made with love.</p>
                    </section>
                    <!-- Contact Section -->
                    <section id="contact">
                    <h2>Contact Us</h2>
                    <p>Email: coffeeshop@example.com</p>
                    <p>Phone: 0912-345-6789</p>
                    </section>
                    </html>