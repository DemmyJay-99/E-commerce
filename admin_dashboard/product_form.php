<?php
// Database connection
include_once 'config.php';

// Fetch Categories
$category_query = "SELECT * FROM categories";
$categories = $conn->query($category_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <h2>Add New Product</h2>
    <form id="productForm" action="add_product.php" method="POST" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="category">Category</label>
        <select id="category" name="category_id" required>
            <option value="">Select a Category</option>
                <?php while ($row = $categories->fetch_assoc()): ?>
                    <option value="<? = $row['id'] ?>"><?=htmlspecialchars($row['category_name'])?>
                    </option>
                    <?php endwhile; ?>
        </select>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit">Add Product</button>
    </form>

    <script src="validate.js"></script>
</body>
</html>