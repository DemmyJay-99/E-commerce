<?php
session_start();
include 'config.php'; // Include the database connection file

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$stmt = $conn->prepare("SELECT username, email FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Registered Users</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>