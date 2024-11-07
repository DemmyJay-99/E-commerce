<?php
// Database connection
include_once 'config.php';

// Fetch product details for editing
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    if (!$product) {
        echo "Product not found!";
        exit;
    }
} else {
    echo "No product ID provided!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <h2>Edit Product</h2>
    <form id="editProductForm" action="update_products.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?= $product['price'] ?>" step="0.01" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($product['description']) ?></textarea>

        <label for="image">Current Image:</label>
        <img src="<?= $product['image'] ?>" width="100" alt="Product Image">

        <label for="new_image">Change Image:</label>
        <input type="file" id="new_image" name="new_image" accept="image/*">

        <button type="submit">Update Product</button>
    </form>
</body>
</html>