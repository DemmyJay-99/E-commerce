<?php
include_once 'config.php'; // Database connection

// Admin credentials
$username = 'admin'; // Change this to the desired username
$password = 'admin123'; // Change this to the desired password

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the admin into the database
$stmt = $conn->prepare('INSERT INTO admins (username, password) VALUES (?, ?)');
$stmt->bind_param('ss', $username, $hashed_password);

if ($stmt->execute()) {
    echo "Admin added successfully!";
} else {
    echo "Error: " . $stmt->error;
}
?>