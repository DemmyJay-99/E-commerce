<?php
session_start();
include_once 'config.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute query to fetch admin data
    $stmt = $conn->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Verify password and start session
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: dashboard.php');
    } else {
        echo "Invalid username or password!";
    }
}
?>