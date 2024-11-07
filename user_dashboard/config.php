<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "new_web_class_db";

$conn = new mysqli($host,$user,$password,$dbname);

if ($conn->connect_error) {
    die("Connection_failed: " . $conn->connect_error);
}
// Update last_activity timestamp
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Update the last_activity timestamp for the logged-in user
    $stmt = $conn->prepare("UPDATE users SET last_activity = NOW() WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();
}
?>