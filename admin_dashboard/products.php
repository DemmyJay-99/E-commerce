<?php
include_once 'config.php';

$query = "
    SELECT p.id, p.product_name, p.price, p.description, p.image, IFNULL(c.category_name, 'No category')
    AS category_name
    FROM products p
   LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.created_at DESC
    ";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <h2>All Products</h2>

    <table border="2">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['category_name']) ?></td>
                <td><img src="<?= $row['image'] ?>" width="100" alt="Product Image"></td>
                <td>
                    <a href="edit_products.php?id=<?= $row['id'] ?>">Edit</a>
                    <form action="delete_products.php" method="POST" style="display:inline;">
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