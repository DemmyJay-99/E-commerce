<?php
// Database connection
include_once 'config.php';

function sanitizeInput($input, $conn) {
    return htmlspecialchars($conn->real_escape_string($input));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $product_name = sanitizeInput($_POST['product_name'], $conn);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $description = sanitizeInput($_POST['description'], $conn);

    // Check if a new image is uploaded
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['new_image']['type'];

        if (in_array($file_type, $allowed_types)) {
            // Get the current image path to delete
            $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($old_image_path);
            $stmt->fetch();
            $stmt->close();

            if (file_exists($old_image_path)) {
                unlink($old_image_path);  // Delete old image
            }

            $image_name = basename($_FILES['new_image']['name']);
            $image_path = 'images/' . $image_name;

            // Move new image to uploads directory
            if (move_uploaded_file($_FILES['new_image']['tmp_name'], $image_path)) {
                // Update with new image
                $stmt = $conn->prepare("UPDATE products SET product_name = ?, price = ?, description = ?, image = ? WHERE id = ?");
                $stmt->bind_param("sdssi", $product_name, $price, $description, $image_path, $id);
            } else {
                echo "Failed to upload new image.";
                exit;
            }
        } else {
            echo "Invalid image file type.";
            exit;
        }
    } else {
        // No new image uploaded, only update the text fields
        $stmt = $conn->prepare("UPDATE products SET product_name = ?, price = ?, description = ? WHERE id = ?");
        $stmt->bind_param("sdsi", $product_name, $price, $description, $id);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>