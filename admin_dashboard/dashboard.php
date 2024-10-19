<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

echo "Welcome, " . $_SESSION['admin_username'] . "! <a href='admin_logout.php'>Logout</a>";
?>