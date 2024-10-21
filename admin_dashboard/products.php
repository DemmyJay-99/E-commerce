<?php
// Database connection
include_once 'config.php';

$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>All Products</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><img src="<?= $row['image'] ?>" width="100" alt="Product Image"></td>
                <td>
                    <form action="delete_products.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>