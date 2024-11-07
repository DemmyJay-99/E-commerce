<?php
include_once 'config.php';

function sanitizeInput($input, $conn) {
    return htmlspecialchars($conn->real_escape_string($input));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = sanitizeInput($_POST['product_name'], $conn);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $description = sanitizeInput($_POST['description'], $conn);
    $category_id = intval($_POST['category_id']); // Ensure category ID is an integer

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];

        if (in_array($file_type, $allowed_types)) {
            $image_name = basename($_FILES['image']['name']);
            $image_path = 'images/' . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                // Insert product with category
                $stmt = $conn->prepare("INSERT INTO products (product_name, price, description, image, category_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sdssi", $product_name, $price, $description, $image_path, $category_id);

                if ($stmt->execute()) {
                    echo "Product added successfully!";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Failed to upload image.";
            }
        } else {
            echo "Invalid file type.";
        }
    } else {
        echo "Image upload error.";
    }
}

$conn->close();
?>