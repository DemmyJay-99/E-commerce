<?php
session_start();
include 'config.php'; // Include the MySQLi database connection

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Update online status to 0 (offline) in the database
    $stmt = $conn->prepare("UPDATE users SET online_status = 0 WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $userId); // Correct MySQLi method is bind_param (all lowercase with an underscore)
        $stmt->execute();
        $stmt->close();
    }
}

// Destroy the session and log the user out
session_unset();
session_destroy();
header("Location: login.html");
exit();
?>