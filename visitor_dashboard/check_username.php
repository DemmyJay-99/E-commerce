<?php
// Database connection
include_once 'config.php';

if (isset($_POST['first_name'])) {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $sql = "SELECT * FROM users WHERE first_name = '$first_name'";
    $result = $conn->query($sql);
}
$conn->close();
?>