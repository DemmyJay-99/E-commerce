<?php
session_start();
include_once 'config.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute query to fetch user data
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password and start session
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_username'] = $user['username'];
        header('Location: about_page.php');
    } else {
        echo "Invalid username or password!";
    }
}
?>